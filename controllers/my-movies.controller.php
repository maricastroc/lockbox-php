<?php

$user = auth();

$myMovies = $database->query(
  query: "SELECT * FROM movies WHERE user_id = :id",
  class: Movie::class,
  params: ['id' => $user->id]
)->fetchAll();

view('my-movies', [
  'my-movies' => $myMovies,
]
);