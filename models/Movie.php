<?php

class Movie {
  public $user_id;
  public $id;
  public $director;
  public $title;
  public $synopsis;
  public $release_year;
  public $cover_url;
  public $rating;
  public $ratings;
  public $gender_id;

  public static function make($item) {
    $movie = new self();

    $movie->title = $item['title'];
    $movie->id = $item['id'];
    $movie->user_id = $item['user_id'];
    $movie->synopsis = $item['synopsis'];
    $movie->cover_url = $item['cover_url'];
    $movie->rating = $item['rating'];
    $movie->ratings = $item['ratings'];
    $movie->gender_id = $item['gender_id'];
    $movie->director = $item['director'];
    $movie->release_year = $item['release_year'];
  
    return $movie;
  }

  public function getAverageRating(): int
  {
    $database = new Database(config('database'));

    $ratings = $database->query(
      query: "SELECT rating FROM ratings WHERE movie_id = :movie_id",
      params: ['movie_id' => $this->id]
    )->fetchAll();

    if (empty($ratings)) {
      return 0;
    }

    $totalRating = array_reduce($ratings, function ($carry, $item) {
      return $carry + $item['rating'];
    }, 0);

    return round($totalRating / count($ratings));
  }

  public function getRatingsQuantity(): int
  {
    $database = new Database(config('database'));

    $ratings = $database->query(
      query: "SELECT rating FROM ratings WHERE movie_id = :movie_id",
      params: ['movie_id' => $this->id]
    )->fetchAll();

    $ratingsQuantity = count($ratings);

    return $ratingsQuantity;
  }
}