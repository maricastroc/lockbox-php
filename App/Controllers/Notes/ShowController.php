<?php

namespace App\Controllers\Notes;

use App\Models\Note;
use App\Models\User;
use Core\Database;
use Core\Validation;

use function Core\auth;
use function Core\config;
use function Core\dd;
use function Core\flash;
use function Core\redirect;
use function Core\request;
use function Core\session;
use function Core\view;

  class ShowController {
    
    public function show() {
      $validations = [];

      $rules = [
        'password' => ['required'],
      ];
  
      $validation = Validation::validate($rules, request()->all());
  
      $validations = $validation->validations;

      if (!empty($validations)) {
        flash()->push('validations', $validations);
        return view('/notes/confirm');
      }

      if (!password_verify(request()->post('password'), auth()->password)) {
        flash()->push('validations', ['password' => [
          'Incorrect password!'
        ]]);
  
        return view('/notes/confirm');
      }

      session()->set('show', true);

      return redirect('/notes');
    }

    public function hide() {
      session()->forget('show');

      return redirect('/notes');
    }

    public function confirm() {
      return view('/notes/confirm');
    }

  }