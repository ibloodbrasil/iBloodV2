<?php

namespace App\Controllers;

use CodeIgniter\Shield\Controllers\MagicLinkController as ShieldLogin;
use CodeIgniter\HTTP\RedirectResponse;
use App\Controllers\BaseController;
use CodeIgniter\Events\Events;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\I18n\Time;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Models\LoginModel;
use CodeIgniter\Shield\Models\UserIdentityModel;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Traits\Viewable;


class MagicLinkController extends ShieldLogin
{
    protected function displayMessage(): string
    {
        return $this->view('Shield/magic_link_message.php');
    }

    public function loginView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        return $this->view('Shield/magic_link_form.php');
    }
    public function loginAction()
    {
        // Validate email format
        $rules = $this->getValidationRules();
        if (! $this->validateData($this->request->getPost(), $rules)) {
            return redirect()->route('magic-link')->with('errors', $this->validator->getErrors());
        }

        // Check if the user exists
        $email = $this->request->getPost('email');
        $user  = $this->provider->findByCredentials(['email' => $email]);

        if ($user === null) {
            return redirect()->route('magic-link')->with('error', lang('Auth.invalidEmail'));
        }

        /** @var UserIdentityModel $identityModel */
        $identityModel = model(UserIdentityModel::class);

        // Delete any previous magic-link identities
        $identityModel->deleteIdentitiesByType($user, Session::ID_TYPE_MAGIC_LINK);

        // Generate the code and save it as an identity
        helper('text');
        $token = random_string('crypto', 20);

        $identityModel->insert([
            'user_id' => $user->id,
            'type'    => Session::ID_TYPE_MAGIC_LINK,
            'secret'  => $token,
            'expires' => Time::now()->addSeconds(setting('Auth.magicLinkLifetime'))->format('Y-m-d H:i:s'),
        ]);

        /** @var IncomingRequest $request */
        $request = service('request');

        $ipAddress = $request->getIPAddress();
        $userAgent = (string) $request->getUserAgent();
        $date      = Time::now()->toDateTimeString();

        // Send the user an email with the code

        $email = \Config\Services::email();
        $email->setFrom(setting('Email.fromEmail'), setting('Email.fromName') ?? '');
        $email->setTo($user->email);
        $email->setSubject(lang('Auth.magicLinkSubject'));
        $email->setMessage($this->view('Shield/Email/magic_link_email.php', ['token' => $token, 'ipAddress' => $ipAddress, 'userAgent' => $userAgent, 'date' => $date]));

        if ($email->send(false) === false) {
            log_message('error', $email->printDebugger(['headers']));

            return redirect()->route('magic-link')->with('error', lang('Auth.unableSendEmailToUser', [$user->email]));
        }

        // Clear the email
        $email->clear();

        return $this->displayMessage();
    }

}
