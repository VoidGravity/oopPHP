<?php

namespace controllers\dashboard;

use Model\Notification;

class ContactController
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('login');
        }
    }
    public function index()
    {
        $data =  [
            "notifications" => Notification::get(),
        ];
        return view("dashboard/contact", $data);
    }
}
