<?php

namespace App\Controllers\Notes;

use App\Models\Note;
use Core\Validation;

use function Core\flash;
use function Core\redirect;
use function Core\request;
use function Core\session;

class UpdateController
{
    public function __invoke()
    {
        $shouldUpdateNote = session()->get('show');

        $validations = [];

        $rules = array_merge([
            'title' => ['required', 'min:3', 'max:255'],
            'id' => ['required'],
        ], $shouldUpdateNote ? ['note' => ['required']] : []);

        $validation = Validation::validate($rules, request()->all());

        $validations = $validation->validations;

        if (! empty($validations)) {
            flash()->push('validations', $validations);

            return redirect('/notes?id='.request()->post('id'));
        }

        Note::update(request()->post('id'), request()->post('title'), request()->post('note'));

        flash()->push('successfully_updated', 'Note successfully updated!');

        return redirect('notes');
    }
}
