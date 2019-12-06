<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Model.php');
  require('./models/User.php');
  $req->sessionStart();
  $db = \Rapid\Database::getPDO();

  function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }

  $form_was_posted = [];
  $form_error_messages = [];
  $error['error'] = "Invalid email or password";
  $form_was_posted = $req->body('email') !== NULL;
  if($req->body('email') !== NULL || $req->body('password') !== NULL){
    $email = FormUtils::getPostEmail($req->body('email'));
    $passwordEntered = $req->body('password');
    // email not 
    if($email['is_valid'] || $email !== NULL)
    {
      $user = User::getUserByEmail($email['value'], $db);
      if($user !== NULL)
      {
        $userPass = $user->getHash();
        $validUser = false;

        // if($passwordEntered == $userPass)
        // {
           $validUser = true;
        // }
        //$validUser = password_verify($passwordEntered, $userPass);

        if($validUser)
        {
          $user = User::getUserByEmail($email['value'], $db);
          $req->sessionSet('LOGGED_IN',TRUE);
          $req->sessionSet('Name',$user->getName());
          $req->sessionSet('Id', $user->getUser_id());
          $req->sessionSet('Email', $user->getEmail());
          $req->sessionSet('Type', $user->getUser_type());
          $res->redirect('/');
        }
      }
    }
  }
  $req->sessionSet('LOGGED_IN',FALSE);
  $res->render('main', 'login', [
      'pageTitle' => 'User Login',
      'form_error_messages' => $error
  ]);

} 
?>