<?php return function($req, $res) {
$req->sessionStart();
$req->sessionDestroy();
$_SESSION = [];
$res->redirect("./login");

}
?>