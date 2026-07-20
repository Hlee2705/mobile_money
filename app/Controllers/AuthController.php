<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController extends BaseController
{
    protected AuthService $authService;


    public function __construct()
    {
        $this->authService = new AuthService();
    }


    public function index()
    {
        return view('auth/login');
    }


    public function login()
    {
        $numero = $this->request->getPost('numero');


        $result = $this->authService->login($numero);


        if (!$result['success']) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $result['message']);
        }


        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}