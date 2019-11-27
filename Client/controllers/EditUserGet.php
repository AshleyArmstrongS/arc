<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php return function($req, $res) {


    $req->sessionStart();
    
    if ($_SESSION['LOGGED_IN'] === TRUE) { 
      

 $db = \Rapid\Database::getPDO();
  require('./models/User.php');

  $user_id    = $_SESSION['Id'];
  $user       = User::getUserById($user_id, $db);

 $res->render('main', 'editUser', [
 'pageTitle' => 'Register',
 'user' => $user
 
 ]);
    }
    else{
        $res->render('main', '404', []);
    }
 
} ?>