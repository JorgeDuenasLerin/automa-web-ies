<?php

require_once('config.php');



class IESWebManager {

  private $cliente;
  private $session_id;
  private $config;
  private $lastResponse;

  function __construct(){
    global $config;
    $this->config = $config;

    $this->cliente = new GuzzleHttp\Client([
        'base_uri' => $this->config['url'],
        'timeout'  => $this->config['timeout'],
        'cookies' => true,
    ]);
  }

  function getIndex() {
    $this -> lastResponse = $this -> cliente -> get($this -> config['url']);
    return $this -> lastResponse;
  }

  function getContenido() {
    $this -> lastResponse = $this -> cliente -> get($this -> config['url_contenido']);
    return $this -> lastResponse;
  }

  function login() {
    $id_p_login = $this -> config['id_login'];
    $response = $this -> cliente -> request('POST', $this -> config['url_login'], [
        'form_params' => [
            "_${id_p_login}_formDate" => time(),
            "_${id_p_login}_saveLastPath" => false,
            "_${id_p_login}_doActionAfterLogin" => false,
            "_${id_p_login}_rememberMe" => false,

            "_${id_p_login}_login" => $this -> config['user'],
            "_${id_p_login}_password" => $this -> config['pass'],
        ]
    ]);

    foreach ($response->getHeaders() as $name => $values) {
        echo $name . ': ' . implode(', ', $values) . "\r\n";
    }

    /**/

  }

  function debug() {
    echo "CODE";
    echo $this -> lastResponse -> getStatusCode();

    echo "COOKIES";
    $cookieJar = $this -> cliente -> getConfig('cookies');
    print_r($cookieJar->toArray());

    echo "BODY";
    echo $this -> lastResponse -> getBody();
  }
}

 ?>
