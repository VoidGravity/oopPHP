<?php

namespace controllers\auth;

use Model\User;

class LoginController
{

    public function index()
    {
        return view('login');
    }

    public function logout()
    {
        clearSession();
        redirect('login');
    }

    public function login($request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $user = User::findBy('username', $username);
        if ($user) {
            if (password_verify($password, $user->password)) {
                setSessionParam('id', $user->id);
                setSessionParam('username', $username);
                setSessionParam('role', $user->role_name);
                redirect('dashboard');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }
}
