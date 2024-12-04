<?php

namespace App\Controllers\Notes;

use App\Models\Note;
use Core\Validation;

use function Core\flash;
use function Core\redirect;
use function Core\request;

  class UpdateController {   
    public function __invoke() {
      $validations = [];
  
      $rules = [
        'title' => ['required', 'min:3', 'max:255'],
        'note' => ['required'],
        'id' => ['required'],
      ];
  
      $validation = Validation::validate($rules, request()->all());
  
      $validations = $validation->validations;
  
      if (!empty($validations)) {
        flash()->push('validations', $validations);
        return redirect('/notes?id=' . request()->post('id'));
      }

      Note::update(request()->post('id'), request()->post('title'), request()->post('note'));

      flash()->push('successfully_updated', 'Note successfully updated!');

      return redirect('notes');
  }
  }