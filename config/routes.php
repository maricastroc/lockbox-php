<?php

use App\Controllers\DashboardController;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use Core\Route;

use function Core\abort;

(new Route())
  ->get('/', IndexController::class)

  ->post('/login', [LoginController::class, 'login'])
  ->get('/login', LoginController::class)

  ->get('/logout', LogoutController::class)

  ->get('/dashboard', DashboardController::class)

  ->post('/register', [RegisterController::class, 'register'])
  ->get('/register', RegisterController::class)

  ->run();
