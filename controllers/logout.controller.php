<?php
  unset($_SESSION["auth"]);

  header('location: /login');

  exit();
?>