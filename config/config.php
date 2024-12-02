<?php

use function Core\base_path;

return [
  'database' => [
    'driver' => 'sqlite',
    'database' => base_path('database/database.sqlite'),
  ]
];