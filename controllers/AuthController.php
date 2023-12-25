<?php


class AuthController
{


    public function login($request)
    {
        $email = $request['email'];
        print_r($email);
    }
    public function regiter($request)
    {
    }
    public function logout($request)
    {
    }
    public function resetPasword($request)
    {
    }
    public function verifyEmail($request)
    {
    }
}
