<?php

require(dirname(__FILE__).'/../vendor/autoload.php');

$config_default = [
  'url' => "https://www.educa2.madrid.org/",
  'url_login' => "asd",
  'user' => "usuario",
  'pass' => "1234",
];

// Declara una variable $config para producción
require('config.producción.php');

foreach ($config as $key => $value) {
  $config_default[$key] = $value;
}

$config = $config_default;


 ?>
