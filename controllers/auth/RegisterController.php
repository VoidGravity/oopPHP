<?php

namespace controllers\auth;

use Model\User;

class RegisterController
{

    public function index()
    {
        $data = [
            "error" => isset($_GET['error']) ? $_GET['error'] : null
        ];
        return view('register', $data);
    }

    public function register($request)
    {
        $tm = $request['tm'];
        if (strlen($tm) == 0) {
            redirect('register?error=You should accept terms & condition');
        }
        $username = $request['username'];
        if (strlen($username) == 0) {
            redirect('register?error=Username is required!');
        }
        $email = $request['email'];
        if (strlen($email) == 0) {
            redirect('register?error=Email is required!');
        }
        $password = $request['password'];
        if (strlen($password) == 0) {
            redirect('register?error=Password is required!');
        }
        $password_conf = $request['password_conf'];
        if (strlen($password_conf) == 0) {
            redirect('register?error=Password_conf is required!');
        }

        if (validatePassword($password) && $password === $password_conf) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user = User::create($username, $hash, $email);
            if ($user) {
                redirect('login');
            } else {
                redirect('register?error=Registration failed!');
            }
        } else {
            redirect('register?error=Invalid password');
        }
    }
}
