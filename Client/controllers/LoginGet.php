<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {

  $req->sessionStart();

  if ($_SESSION['LOGGED_IN'] === True) {
    $res->render('main', '404', []);
  } else {
    $res->render('main', 'login', [
      'pageTitle' => 'User Login'

    ]);
  }
} ?>

