<?php return function($req, $res) {
  //opens a socket and connects to java
  require_once('lib/Socket.php');

  //create the string to be sent to java 
  $send ='Wow i did it'.PHP_EOL;
 //write the string to the socket
  $written = socket_write($socket, $send, strlen($send));
  if(!$written){die("error writing\n");}
 
  //wait for repsonse
  $read = socket_read($socket, 2048 );
  if(!$read){die("Error reading\n");}

  // render to view
  $res->render('main', 'home', ['value' => $read]);

  //close socket 
  $close = true;
} ?>