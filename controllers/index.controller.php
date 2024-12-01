<?php

$search = $_REQUEST['search'] ?? null;

view('index', [
  'movies' => $database->query(
    query: "SELECT * FROM movies WHERE title LIKE :filter",
    class: Movie::class,
    params: ['filter' => "%$search%"]
  )->fetchAll(),

  'ratings' => $database->query(
    query: "SELECT * FROM ratings",
    class: Rating::class,
  )->fetchAll(),

  'search' => $search,
]);