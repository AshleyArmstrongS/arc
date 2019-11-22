<?php return function($req, $res) {

 $req->sessionStart();
 
    
 $res->render('main', 'Home', [
 'pageTitle' => 'Home'
 
 ]);
 
} ?>
