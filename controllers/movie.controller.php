<?php

$id = intval($_REQUEST['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    handlePostRequest($id);
} else {
    renderMoviePage($id);
}

function handlePostRequest($movieId)
{
    $user = auth();
    if (!$user) {
        abort(403, 'User not authorized.');
    }

    $validationErrors = validateReviewInput($_POST);

    if (!empty($validationErrors)) {
        flash()->push('validations', $validationErrors);
        redirectToMoviePage($movieId);
    }

    saveReview($user->id, $movieId, $_POST);

    flash()->push('message', 'Review successfully registered!');
    redirectToMoviePage($movieId);
}

function validateReviewInput($input)
{
    $rules = [
        'rating' => ['required', 'min:1', 'max:5'],
        'review' => ['required'],
        'movie_id' => ['required'], // Adicionado para garantir que o ID do filme seja enviado
    ];

    $validation = Validation::validate($rules, $input);
    return $validation->validations ?? [];
}

function saveReview($userId, $movieId, $input)
{
    global $database;

    $database->query(
        query: "INSERT INTO ratings (user_id, movie_id, rating, review) 
                VALUES (:user_id, :movie_id, :rating, :review)",
        params: [
            'user_id' => $userId,
            'movie_id' => $movieId,
            'rating' => $input['rating'],
            'review' => $input['review'],
        ]
    );
}

function redirectToMoviePage($movieId)
{
    header("Location: /movie?id=$movieId");
    exit();
}

function renderMoviePage($movieId)
{
    global $database;

    $movie = getMovie($movieId);
    $ratings = getRatingsWithUserNames($movieId);

    view('movie', [
        'movie' => $movie,
        'ratings' => $ratings,
    ]);
}

function getMovie($movieId)
{
    global $database;

    return $database->query(
        query: "SELECT * FROM movies WHERE id = :id",
        class: Movie::class,
        params: ['id' => $movieId]
    )->fetch();
}

function getRatingsWithUserNames($movieId)
{
    global $database;

    return $database->query(
        query: "SELECT ratings.*, users.name AS user_name 
                FROM ratings 
                JOIN users ON ratings.user_id = users.id 
                WHERE ratings.movie_id = :movie_id",
        params: ['movie_id' => $movieId]
    )->fetchAll(PDO::FETCH_CLASS, Rating::class);
}
