<?php
$id = intval($_REQUEST['id']);

// Buscar informações do filme
$movie = $database->query(
  query: "SELECT * FROM movies WHERE id = :id",
  class: Movie::class,
  params: ['id' => $id]
)->fetch();

$ratings = $database->query(
  query: "SELECT ratings.*, users.name AS user_name 
          FROM ratings 
          JOIN users ON ratings.user_id = users.id 
          WHERE ratings.movie_id = :movie_id",
  params: ['movie_id' => $id]
)->fetchAll(PDO::FETCH_CLASS, Rating::class);

// Adiciona o nome do usuário diretamente no objeto Rating
foreach ($ratings as $rating) {
    $rating->user_name = $rating->user_name; // Agora cada Rating tem a propriedade user_name
}

// Passando os dados de avaliações para a view, já incluindo o nome do usuário
view('movie', [
  'movie' => $movie,
  'ratings' => $ratings, // Agora o array $ratings já tem 'user_name'
]);
