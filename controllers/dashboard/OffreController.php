<?php

namespace controllers\dashboard;

use Model\Employee;
use Model\Notification;

class OffreController
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
        return view("dashboard/offre", $data);
    }
    public function updateStatus($request)
    {
        Employee::updateStatus($request['status'],$request['id']);
        Notification::create("Offer status changed", "The offer with id " . $request['id'] . "has been updated to " . $request['status']);
        redirect('dashboard/offre');
    }
}
