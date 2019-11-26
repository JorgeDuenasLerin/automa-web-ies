<?php

require(dirname(__FILE__).'/../src/config.php');
require(dirname(__FILE__).'/../src/IESWebManager.php');


$web = new IESWebManager();



$response = $web -> getIndex();
//$web -> debug();
//$web -> printCookies();

$response = $web -> login();
//$web -> debug();

$response = $web -> getContenido();
$web -> debug();


/*
echo $response->getStatusCode();
echo $response->getBody();
*/
 ?>
