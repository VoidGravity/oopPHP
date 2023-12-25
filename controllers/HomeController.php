<?php


class HomeController
{
    public function index()
    {
        $user = [
            "name" => "aziz",
            "last_name" => "bardich"
        ];
        echo view('test', $user);
    }
}
