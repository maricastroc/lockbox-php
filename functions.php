<?php

function view($view, $data = [])
{
  require 'views/template/app.php';
}

function abort($code)
{
  view($code);

  die();
}

function auth() {
  if (!isset($_SESSION['auth'])) {
    return null;
  }

  return $_SESSION['auth'];
}

function config($key = null) {
  $config = require 'config.php';

  if ($key !== null) {
    return $config[$key];
  }

  return $config;
}

function flash()
{
  return new Flash;
}

function calculateAverageRating(array $ratings): int {
  if (count($ratings) === 0) {
      return 0;
  }

  $totalRating = 0;
  foreach ($ratings as $rating) {
      $totalRating += $rating->rating;
  }

  return round($totalRating / count($ratings));
}