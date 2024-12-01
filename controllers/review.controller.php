<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = auth();

  if (!$user) {
    abort(403);
  }

  $validations = [];

  $rules = [
    'rating' => ['required', 'min:1', 'max:5'],
    'review' => ['required'],
  ];

  $validation = Validation::validate($rules, $_POST);

  $validations = $validation->validations;

  if (!empty($validations)) {
    flash()->push('validations', $validations);

    header("Location: /movie?id=$id");

    exit();
  }

  $database->query(
    query: "INSERT INTO ratings (user_id, movie_id, rating, review) 
      VALUES (:user_id, :movie_id, :rating, :review)",
    class: Rating::class,
    params: [
      'user_id' => $user->id,
      'movie_id' => $movie->id,
      'rating' => $_POST['rating'],
      'review' => $_POST['review'],
    ]
  );
  
  flash()->push('message', 'Review successfully registered!');
  
  header("Location: /movie?id=$id");

  exit();
}
