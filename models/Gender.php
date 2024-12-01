<?php

class Gender {
  public $id;
  public $name;

  public static function make($item) {
    $gender = new self();

    $gender->id = $item['id'];
    $gender->name = $item['name'];

    return $gender;
  }
}