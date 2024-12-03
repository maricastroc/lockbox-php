<?php

use App\Controllers\DashboardController;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use App\Controllers\Notes;
use Core\Route;

use function Core\abort;

(new Route())
  ->get('/', IndexController::class)

  ->post('/login', [LoginController::class, 'login'])
  ->get('/login', [LoginController::class, 'index'])

  ->get('/logout', LogoutController::class)

  ->get('/dashboard', DashboardController::class)

  ->get('/notes/create', [Notes\CreateController::class, 'index'])
  ->post('/notes/create', [Notes\CreateController::class, 'store'])

  ->post('/register', [RegisterController::class, 'register'])
  ->get('/register', [RegisterController::class, 'index'])

  ->run();
