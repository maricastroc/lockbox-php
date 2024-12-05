<?php

use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use App\Controllers\Notes;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use Core\Route;

(new Route())
  ->get('/', IndexController::class)

  ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
  ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)

  ->get('/logout', LogoutController::class, AuthMiddleware::class)

  ->get('/notes', [Notes\IndexController::class, 'index'], AuthMiddleware::class)

  ->get('/notes/create', [Notes\CreateController::class, 'index'], AuthMiddleware::class)
  ->post('/notes/create', [Notes\CreateController::class, 'store'], AuthMiddleware::class)

  ->put('/note', Notes\UpdateController::class, AuthMiddleware::class)
  ->delete('/note', Notes\DeleteController::class, AuthMiddleware::class)

  ->post('/register', [RegisterController::class, 'register'], GuestMiddleware::class)
  ->get('/register', [RegisterController::class, 'index'], GuestMiddleware::class)

  ->post('/show', [Notes\ShowController::class, 'show'], AuthMiddleware::class)
  ->get('/hide', [Notes\ShowController::class, 'hide'], AuthMiddleware::class)
  ->get('/confirm', [Notes\ShowController::class, 'confirm'], AuthMiddleware::class)

  ->run();
