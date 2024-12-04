<?php

use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use App\Controllers\Notes;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use Core\Route;

use function Core\abort;

(new Route())
  ->get('/', IndexController::class)

  ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
  ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)

  ->get('/logout', LogoutController::class, AuthMiddleware::class)

  ->get('/notes', [Notes\IndexController::class, 'index'], AuthMiddleware::class)

  ->get('/notes/create', [Notes\CreateController::class, 'index'], AuthMiddleware::class)
  ->post('/notes/create', [Notes\CreateController::class, 'store'], AuthMiddleware::class)

  ->post('/register', [RegisterController::class, 'register'], GuestMiddleware::class)
  ->get('/register', [RegisterController::class, 'index'], GuestMiddleware::class)

  ->run();
