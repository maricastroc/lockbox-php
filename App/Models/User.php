<?php

namespace App\Models;

use Core\Database;

use function Core\config;

  class User {
    public $id;
    public $name;
    public $email;
    public $password;
    public $avatar_url;

    public static function make($item) {
      $user = new self();

      $user->id = $item['id'];
      $user->name = $item['name'];
      $user->password = $item['password'];
      $user->email = $item['email'];
      $user->avatar_url = $item['avatar_url'];

      return $user;
    }

    public static function create($name, $email, $password)
    {
      $database = new Database(config('database'));

      $database->query(
        query: "insert into users (email, password, name) values (:email, :password, :name)",
        params: [
          'email' => $email,
          'password' => password_hash($password, PASSWORD_DEFAULT),
          'name' => $name,
        ],
      );
    }
  }