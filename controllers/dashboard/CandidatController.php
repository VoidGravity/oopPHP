<?php

namespace controllers\dashboard;

use Model\employee;
use Model\Notification;

class CandidatController
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('login');
        }
    }
    public function index()
    {

        $data = [
            "notifications" => Notification::get(),
            "offers" => Employee::get()
        ];
        return view("dashboard/candidat", $data);
    }
}
