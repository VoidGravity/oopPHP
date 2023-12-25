<?php

use __classes\Router;
use controllers\auth\LoginController;
use controllers\auth\RegisterController;
use controllers\dashboard\CandidatController;
use controllers\dashboard\ContactController;
use controllers\dashboard\HomeController;

use controllers\dashboard\HomeindexController;

use controllers\dashboard\ListController;
use controllers\dashboard\OffreController;


// Auth

Router::get('/login', LoginController::class, 'index');
Router::post('/login', LoginController::class, 'login');

Router::get('/logout', LoginController::class, 'logout');

Router::get('/register', RegisterController::class, 'index');
Router::post('/register', RegisterController::class, 'register');

Router::get('/dashboard', HomeController::class, 'index');
Router::get('/dashboard/candidat',CandidatController::class,'index');
Router::get('/dashboard/offre',OffreController::class,'index');
Router::get('/dashboard/offre/update',OffreController::class,'updateStatus');
Router::get('/dashboard/contact',ContactController::class,'index');
Router::get('/dashboard/list',ListController::class,'index');
Router::get('/index',HomeindexController::class,'index');
// Router::get('/index',ListController::class,'index');