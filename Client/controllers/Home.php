<?php return function($req, $res) {
  //opens a socket and connects to java
  require_once('lib/Socket.php');

  //create the string to be sent to java 
  // going to be json

  // make an array 


  //$send ='Wow i did it'.PHP_EOL;

  
  $name = "Conor";
  $gender = "male";
  
  // There will be different commands
  //$send = "{\"request\": \"createUser\," "\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}".PHP_EOL;
  
  //$send = "{\"request\": \"createUser\," "\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}".PHP_EOL;
  
  //$send = "{\"request\": \"createUser\," "\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}".PHP_EOL;
  
  //$send = "{\"request\": \"createUser\," "\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}".PHP_EOL;

  
  $event_details = array();
  $day = "fsda";
  $date = "21/12/12";

  $eventArray = [
    'title' => $day,
    'start' => $date
  ];
  
  //$send = json_encode(['Event:' =>$eventArray]);
  

 //write the string to the socket
 
  $written = socket_write($socket, $send, strlen($send));
  if(!$written){die("error writing\n");}
 
  //wait for repsonse
  $read = socket_read($socket, 2048 );
  if(!$read){die("Error reading\n");}

  // render to view
  $json = json_encode($read);

  echo $json;

  $name = $json['x']

  //$res->render('main', 'home', ['value' => $read]);

  //close socket 
  $close = true;

  //$send = "{""Name":"" . $name . "', Gender:'" . $gender . "'}".PHP_EOL;
  
} ?>

