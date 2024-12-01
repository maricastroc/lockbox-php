<?php

use Core\Database;
use Core\Validation;

use function Core\flash;
use function Core\view;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $database = new Database($config['database']);

  $validations = [];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $confirm_password = $_POST['confirm_password'];
  $password = $_POST['password'];

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
    view('register');
  
    exit();
  }

  $database->query(
    query: "insert into users (email, password, name) values (:email, :password, :name)",
    params: [
      'email' => $_POST['email'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
      'name' => $_POST['name'],
    ],
  );

  flash()->push('successfully_registered', 'User successfully registered!');

  header('location: /login');
}

view('register');
