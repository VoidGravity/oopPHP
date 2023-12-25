<?php


class HomeController
{
    public function index()
    {
        $user = [
            "name" => "abdellah",
            "last_name" => "bardich"
        ];
        echo view('test', $user);
    }
}


