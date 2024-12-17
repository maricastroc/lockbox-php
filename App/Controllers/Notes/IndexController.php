<?php

namespace App\Controllers\Notes;

use App\Models\Note;

use function Core\request;
use function Core\view;

class IndexController
{
    public function index()
    {
        $search = request()->get('search', '');

        $notes = Note::all($search);

        $selectedNote = $this->getSelectedNote($notes);

        if (! $selectedNote) {
            return view('notes/not-found');
        }

        return view('notes/index', [
            'notes' => $notes,
            'selectedNote' => $selectedNote,
        ]);
    }

    private function getSelectedNote($notes)
    {
        isset($_GET['id']) ? $id = $_GET['id'] : (count($notes) > 0 ? $id = $notes[0]->id : null);

        $filteredNotes = array_filter($notes, fn ($n) => $n->id == $id);

        return array_pop($filteredNotes);
    }
}
