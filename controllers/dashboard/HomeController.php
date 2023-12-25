<?php

namespace controllers\dashboard;

use Model\Job;
use Model\Notification;

class HomeController
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('login');
        }
    }
    public function index()
    {
        $activeOffers = count(Job::getOpenJobs());
        $approvedOffers = count(Job::getApprovedJobs());
        $totalOffers = count(Job::get());
        $data = [
            "notifications" => Notification::get(),
            "offersCount" => $totalOffers,
            "activeOffresCount" => $activeOffers,
            "inActiveOffresCount" => $totalOffers - $activeOffers,
            "approuvedOffresCount" => $approvedOffers
        ];
        return view('dashboard/home', $data);
    }
}
