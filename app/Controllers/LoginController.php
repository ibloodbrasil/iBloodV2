<?php

namespace App\Controllers;

use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Authentication\Passwords;
use CodeIgniter\Shield\Traits\Viewable;

class LoginController extends ShieldLogin
{
    public function loginView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        return $this->view('Shield/login.php');
    }

    public function loginAction(): RedirectResponse
    {
        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (! $this->validateData($this->request->getPost(), $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $usarCaptcha = false;

        if (!$usarCaptcha){
            $validacaoCaptcha = 'true';
        };

        if ($usarCaptcha){
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://hcaptcha.com/siteverify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => [
                    'response' =>$_POST['h-captcha-response']?? '',
                    'secret' => "0xA1D12d570433208C0468EE7eCdd81D6044250775"
                ]
            ]);

            $response = curl_exec($curl);
            curl_close($curl);
            $responseArray = json_decode($response,true);
            $validacaoCaptcha = $responseArray['success'] ?? false ;
        }

        if ($validacaoCaptcha != true)
        {
            return redirect()->back()->withInput()->with('error', 'Seu acesso ao sistema foi bloqueado pelo captcha, tente realizar o login novamente sem utilizar robôs, scripts ou ferramentas automatizadas');
        }

        $credentials             = $this->request->getPost(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');
        $remember                = (bool) $this->request->getPost('remember');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // Attempt to login
        $result = $authenticator->remember($remember)->attempt($credentials);
        if (! $result->isOK()) {
            return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        // If an action has been defined for login, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show')->withCookies();
        }
        
        return redirect()->to(config('Auth')->loginRedirect())->withCookies();
    }
    public function logoutAction(): RedirectResponse
    {
        // Capture logout redirect URL before auth logout,
        // otherwise you cannot check the user in `logoutRedirect()`.
        $url = config('Auth')->logoutRedirect();

        auth()->logout();

        return redirect()->to($url)->with('message', lang('Auth.successLogout'));
    }
}
