<?php

namespace App\Controllers;

use function Core\auth;
use function Core\redirect;

  class DashboardController {
    
    public function __invoke() {
      if(!auth()) {
        redirect('/login');
      }
    }
  }