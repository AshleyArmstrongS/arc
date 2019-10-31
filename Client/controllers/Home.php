<?php return function($req, $res) {
  //opens a socket and connects to java
  require_once('lib/Socket.php');

  echo("Welcome");

  // //create the string to be sent to java 
  // // going to be json

  // // make an array 


  // //$send ='Wow i did it'.PHP_EOL;

  
  // $name = "Conor";
  // $gender = "male";
  
  // // There will be different commands
  // //$send = "{\"request\": \"createUser\," "\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}".PHP_EOL;
  
  // //$send = "{\"request\": \"createUser\," "\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}".PHP_EOL;
  
  // //$send = "{\"request\": \"createUser\," "\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}".PHP_EOL;
  
  // $send = "{\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}".PHP_EOL;

  
  // $event_details = array();
  // $day = "fsda";
  // $date = "21/12/12";

  // $eventArray = [
  //   'title' => $day,
  //   'start' => $date
  // ];
  
  // $read = socketRequest($send, $socket); 

  // echo $read;
  // // render to view
  // $json = (array) json_decode($read, true);
  // print_r($json);

  // echo $json['name'];

  // //$name = $json['x']

  // //$res->render('main', 'home', ['value' => $read]);

  // //close socket 
  // $close = true;

  // //$send = "{""Name":"" . $name . "', Gender:'" . $gender . "'}".PHP_EOL;
  
} ?>

