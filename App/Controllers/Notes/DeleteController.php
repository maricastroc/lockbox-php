<?php

namespace App\Controllers\Notes;

use App\Models\Note;
use Core\Validation;

use function Core\flash;
use function Core\redirect;
use function Core\request;

  class DeleteController {   
    public function __invoke() {
      $validations = [];
  
      $rules = [
        'id' => ['required'],
      ];
  
      $validation = Validation::validate($rules, request()->all());
  
      $validations = $validation->validations;

      if (!empty($validations)) {
        flash()->push('validations', $validations);
        return redirect('/notes?id=' . request()->post('id'));
      }
  
      Note::delete(request()->post('id'));

      flash()->push('successfully_deleted', 'Note successfully deleted!');

      return redirect('notes');
  }
  }