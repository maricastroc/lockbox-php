<?php

namespace App\Models;

use Carbon\Carbon;
use Core\Database;

use function Core\auth;
use function Core\config;
use function Core\secured_decrypt;
use function Core\secured_encrypt;
use function Core\session;

class Note
{
    public $id;

    public $user_id;

    public $title;

    public $note;

    public $created_at;

    public $updated_at;

    public static function make($item)
    {
        $note = new self;

        $note->id = $item['id'];
        $note->title = $item['title'];
        $note->user_id = $item['user_id'];
        $note->note = $item['note'];
        $note->created_at = $item['created_at'];
        $note->updated_at = $item['updated_at'];

        return $note;
    }

    public static function all($search = null)
    {
        $database = new Database(config('database'));

        $query = 'SELECT * FROM notes WHERE user_id = :user_id';

        if ($search) {
            $query .= ' AND title LIKE :search';
        }

        $params = ['user_id' => auth()->id];

        if ($search) {
            $params['search'] = "%$search%";
        }

        return $database->query(
            query: $query,
            class: self::class,
            params: $params
        )->fetchAll();
    }

    public static function create($title, $note)
    {
        $database = new Database(config('database'));

        $database->query(
            query: 'insert into notes (title, note, user_id, created_at, updated_at) values (:title, :note, :user_id, :created_at, :updated_at)',
            params: [
                'user_id' => auth()->id,
                'title' => $title,
                'note' => $note,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        );
    }

    public static function update($id, $title, $note)
    {
        $database = new Database(config('database'));

        $set = 'title = :title';

        if ($note) {
            $set .= ', note = :note';
        }

        $database->query(
            query: "UPDATE notes SET $set, updated_at = :updated_at WHERE id = :id",
            params: array_merge([
                'id' => $id,
                'title' => $title,
                'updated_at' => date('Y-m-d H:i:s'),
            ], $note ? ['note' => secured_encrypt($note)] : []),
        );
    }

    public static function delete($id)
    {
        $database = new Database(config('database'));

        $database->query(
            query: 'DELETE from notes WHERE id = :id',
            params: [
                'id' => $id,
            ],
        );
    }

    public function note()
    {
        if (session()->get('show')) {
            return secured_decrypt($this->note);
        }

        return str_repeat('*', rand(10, 100));
    }

    public function creationDate() {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function updateDate() {
        return Carbon::parse($this->updated_at);
    }
}
