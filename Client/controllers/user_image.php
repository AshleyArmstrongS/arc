<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/User.php');
 $db = \Rapid\Database::getPDO();
 $req->sessionStart();
 
$user = USER::getUserByUser_ID($_SESSION['Id'], $db);
print_r($_FILES);
if(!empty($_FILES['image']))
    {
        $path = "./assets/user_images/";
        $path = $path . basename( $_FILES['image']['name']);
        $user_image = $_FILES['image']['name'];
        $user->setImage_name($user_image);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        }
        else{
           // $res->redirect('/?success=0');
        }
    }
    else{
        echo("thats a nope");
    }





print_r($user);

 USER::updateUserImage_name($user, $db);

  //$res->redirect('/');
};