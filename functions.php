<?php

function view($view, $data = [])
{
  require '../views/template/app.php';
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
  $config = require '../config.php';

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

function invalidUserError($validations)
{
    if (!is_array($validations)) {
        return '';
    }

    if (in_array('Incorrect e-mail or password!', $validations)) {
        return 'Incorrect e-mail or password!';
    }

    return '';
}