<?php

namespace App\Controllers\Notes;

use Core\Database;
use Core\Validation;

use function Core\auth;
use function Core\config;
use function Core\dd;
use function Core\flash;
use function Core\redirect;
use function Core\view;

  class CreateController {
    public function store()
    {
      $title = $_POST['title'];
      $note = $_POST['note'];
  
      $validations = [];
  
      $data = [
        'title' => $title,
        'note' => $note,
      ];
  
      $rules = [
        'title' => ['required', 'min:3', 'max:255'],
        'note' => ['required'],
      ];
  
      $validation = Validation::validate($rules, $data);
  
      $validations = $validation->validations;
  
      if (!empty($validations)) {
        flash()->push('validations', $validations);
        return view('notes/create');
      }
  
      $database = new Database(config('database'));
  
      $database->query(
        query: "insert into notes (title, note, user_id, created_at, updated_at) values (:title, :note, :user_id, :created_at, :updated_at)",
        params: [
          'user_id' => auth()->id,
          'title' => $_POST['title'],
          'note' => $_POST['note'],
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ],
      );
  
      flash()->push('successfully_created', 'Note successfully created!');

      return redirect('/notes');
    }
  
    
    public function index() {
      return view('notes/create', [
        'user' => auth()
    ]);
  }
  }