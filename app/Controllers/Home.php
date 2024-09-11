<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function autenticador()
    {
        $usuarioModel = new UsuarioModel();
        $usuarioLogado = $usuarioModel->find(session('user')['id']);
        session()->set('user', $usuarioLogado);
        return redirect()->to('home');
    }

    public function index(): string
    {
        return view('home');
    }

    public function privacy(): string
    {
        return view('welcome_message');
    }
}
