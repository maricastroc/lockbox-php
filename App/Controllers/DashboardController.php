<?php

namespace App\Controllers;

use function Core\auth;
use function Core\redirect;
use function Core\view;

  class DashboardController {
    
    public function __invoke() {
      if (!auth()) {
          redirect('/login');
      }
      
      return view('dashboard', [
          'user' => auth()
      ]);
  }
  }