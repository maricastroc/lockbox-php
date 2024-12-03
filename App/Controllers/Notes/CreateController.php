<?php

namespace App\Controllers\Notes;

use function Core\auth;
use function Core\dd;
use function Core\redirect;
use function Core\view;

  class CreateController {
  public function store() {
    dd($_POST);
  }
    
    public function index() {
      if (!auth()) {
          redirect('/login');
      }
      
      return view('notes/create', [
        'user' => auth()
    ]);
  }
  }