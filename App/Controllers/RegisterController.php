<?php

namespace App\Controllers;

use Core\Database;
use Core\Validation;

use function Core\config;
use function Core\flash;
use function Core\redirect;
use function Core\view;

  class RegisterController {
    
    public function register() {
      $validations = [];

      $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'confirm_password' => $_POST['confirm_password'],
        'password' => $_POST['password'],
      ];

      $rules = [
        'name' => ['required'],
        'email' => ['required', 'unique:users'],
        'confirm_password' => ['required'],
        'password' => ['min:8', 'max:30', 'strong', 'confirmed'],
      ];

      $validation = Validation::validate($rules, $data);

      $validations = $validation->validations;

      if (!empty($validations)) {
        flash()->push('validations', $validations);
        return view('register');
      }

      $database = new Database(config('database'));

      $database->query(
        query: "insert into users (email, password, name) values (:email, :password, :name)",
        params: [
          'email' => $_POST['email'],
          'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
          'name' => $_POST['name'],
        ],
      );
    
      flash()->push('successfully_registered', 'User successfully registered!');
    
      redirect('/login');
    }

    public function __invoke() {
      return view('register');
    }
  }