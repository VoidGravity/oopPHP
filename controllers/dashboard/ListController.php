<?php

namespace controllers\dashboard;

use Model\Job;
use Model\Notification;

class ListController
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
            "offers" => Job::get()
        ];
        return view("dashboard/list",$data);
    }
}
