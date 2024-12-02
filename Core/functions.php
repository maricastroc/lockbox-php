<?php

namespace Core;

function base_path($path = '') {
  return realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR . $path;
}

function view($view, $data = [])
{
  require base_path('views/template/app.php');
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

function dd($dump)
{
    echo '<pre>';

    if (is_iterable($dump)) {
        foreach ($dump as $item) {
            var_dump($item);
        }
    } else {
        var_dump($dump);
    }

    echo '</pre>';
    die();
}

function config($key = null) {
  $config = require base_path('config/config.php');

  if ($key !== null) {
    return $config[$key];
  }

  return $config;
}

function flash()
{
  return new Flash;
}

function old($field)
{
  $post = $_POST;

  if (isset($post)) {
    return $post[$field] ?? '';
  }
  
  return '';
}

function getErrors($validations, $field)
{
  $errors = isset($validations[$field]) ? $validations[$field] : [];

  return !empty($errors) ? $errors[0] : '';
}

function redirect($uri)
{
    return header('Location:' . $uri);
}