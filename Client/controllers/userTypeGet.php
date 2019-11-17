<?php return function($req, $res) {
 $req->sessionStart();
 $res->render('main', 'userType', [
 'pageTitle' => 'User Type'
 
 ]);
 
} ?>