<?php

namespace controllers\condidate;

use Model\Job;
// use Model\Notification;

class HomeController
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('login');
        }
        // if (getRole() != 'admin') {
        //     redirect('index');
        // }
    }
    public function index()
    {
        $Offers = Job::get();
        $data = [
            "offers" => $Offers,
            
        ];
        return view('index', $data);
    }
    public function offers($request)
    {
        $kayword = $request["kayword"];
        $location = $request["location"];
        $company = $request["company"];

        $jobs = Job::search($kayword,$location,$company);
        $jobs = array_map(function ($job) {
            $job["image_path"] = assets($job["image_path"]);
            return $job;
        }, $jobs);

        header('Content-Type: application/json; charset=utf-8');

        echo (json_encode($jobs));
    
    }
}