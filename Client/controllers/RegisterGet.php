<?php return function($req, $res) {
 $req->sessionStart();
 $res->render('main', 'register', [
 'pageTitle' => 'Register'
 
 ]);
 
} ?>