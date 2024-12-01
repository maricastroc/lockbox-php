<?php

class Rating {
  public $id;
  public $user_id;
  public $user_name;
  public $movie_id;
  public $review;
  public $created_at;
  public $rating;

  public static function make($item) {
    $rating = new self();

    $rating->id = $item['id'];
    $rating->user_id = $item['user_id'];
    $rating->movie_id = $item['movie_id'];
    $rating->review = $item['review'];
    $rating->created_at = $item['created_at'];
    $rating->rating = $item['rating'];
    $rating->user_name = $item['user_name'];

    return $rating;
  }
}