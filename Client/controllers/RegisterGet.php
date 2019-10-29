
<?php return function($req, $res) {
    require('lib/FormUtils.php' );
    require_once('lib/Socket.php');

    
    $name = ($req->body('name'));
    $gender = ($req->body('gender'));

    //echo($name)

    $send = "{\"name\":\"" . $name . "\", \"gender\":\"" . $gender . "\"}" . PHP_EOL;

//write the string to the socket
    $written = socket_write($socket, $send, strlen($send));
    if (!$written) {
        die("error writing\n");
    }

//wait for repsonse
    $read = socket_read($socket, 2048);
    if (!$read) {
        die("Error reading\n");
    }

// render to view
    $json = (array) json_decode($read, true);
    //print_r($json);
   $res->render('main', 'register', ['value' => $read]);

 //  $res->render('main', 'register', $read);
//close socket 
    $close = true;
}
?>
