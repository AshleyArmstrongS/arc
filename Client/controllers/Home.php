<?php return function($req, $res) {
  //opens a socket and connects to java

  //echo("Welcome");

  require('./lib/FormUtils.php');
  require('./models/Message.php');
  require('./models/Group.php');
  require('./models/User.php');
  $db = \Rapid\Database::getPDO();
  
  // get the groups [groups]
  // get the names of the persons [p1,p2,p3,...pn] in each group
  // get the last message of that chat
  // get the date
  $user_id = 1;

  $userGroups = Group::getGroupsByUser_id($user_id, $db);
  //$messages = Message::getMessagesByGroup_id($userGroups['group_id'], $db);
  // print_r($userGroups);
  // foreach($userGroups as $group)
  // {
  //   echo $group['group_id'];
  // }
  $res->render('main', 'home', [
    'pageTitle' => 'Message',
    //'messages' => $messages,
    'user' => $userGroups
  ]);


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

