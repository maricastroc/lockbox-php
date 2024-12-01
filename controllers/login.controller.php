<?php

use Core\Database;
use Core\Validation;

use function Core\flash;
use function Core\view;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database($config['database']);

    $email = $_POST['email'];

    $password = $_POST['password'];

    $validations = [];

    $data = [
      'email' => $email,
      'password' => $password,
    ];

    $rules = [
      'email' => ['required'],
      'password' => ['min:8'],
    ];

    $validation = Validation::validate($rules, $data);

    $validations = $validation->validations;

    if (!empty($validations)) {
      flash()->push('validations', $validations);
      view('login');
      
      exit();
    }

    $query = $database->query("SELECT * FROM users WHERE email = :email", User::class, ['email' => $email]);

    $user = $query->fetch();

    if ($user) {
        if (!password_verify($password, $user->password)) {
          flash()->push('validations', $validations);

          view('login');
          
          exit();
        }

        $_SESSION['auth'] = $user;

        header('location: /');

        exit();
    } else {
      flash()->push('validations', ['email' => [
        'Incorrect e-mail or password!'
      ]]);

      view('login');
      exit();
    }
}

view('login');