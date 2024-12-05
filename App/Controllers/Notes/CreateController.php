<?php

namespace App\Controllers\Notes;

use App\Models\Note;
use Core\Validation;

use function Core\auth;
use function Core\flash;
use function Core\redirect;
use function Core\request;
use function Core\secured_encrypt;
use function Core\view;

  class CreateController {
    public function store()
    { 
      $validations = [];
  
      $rules = [
        'title' => ['required', 'min:3', 'max:255'],
        'note' => ['required'],
      ];
  
      $validation = Validation::validate($rules, request()->all());
  
      $validations = $validation->validations;
  
      if (!empty($validations)) {
        flash()->push('validations', $validations);
        return view('notes/create');
      }
  
      Note::create(request()->post('title'), secured_encrypt(request()->post('note')));
  
      flash()->push('successfully_created', 'Note successfully created!');

      return redirect('/notes');
    }
  
    
    public function index() {
      return view('notes/create', [
        'user' => auth()
    ]);
  }
  }