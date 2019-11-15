<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/User.php');
 $db = \Rapid\Database::getPDO();
 $form_was_posted = [];


$form_error_messages = [];

$form_was_posted = $req->body('name') !== NULL;


$name = FormUtils::getPostString($req->body('name'));
$age =  FormUtils::getPostInt($req->body('age'));
$gender = FormUtils::getPostString($req->body('gender'));
$email = FormUtils::getPostEmail($req->body('email'));
$password = FormUtils::getPostString($req->body('password1'));
$confirmPass = FormUtils::getPostString($req->body('password2'));
$college = FormUtils::getPostString($req->body('college'));
$description = FormUtils::getPostString($req->body('description'));
$startAddress = FormUtils::getPostString($req->body('starting_location'));
$userType = FormUtils::getPostString($req->body('userType'));
$available =  FormUtils::getPostString($req->body('avail'));
$passwordhash = password_hash($password['value'],PASSWORD_BCRYPT,['cost' => 12]);

if(!($password['value'] === $confirmPass['value']))
{
      $form_error_messages['password'] = 'Password and confirm passwords must match';
}
else
{
    $regex = "/(?=^.{8,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W])^.*/";
    //input must be like preg_match below
    if(!preg_match($regex, $password['value'])) 
    {
        $form_error_messages['password'] = 'Invalid Password must be at least 8 characters, include a lower case, an upper case, a number and a special character';
    }
}

    if (!$email['is_valid']) 
    {
        $form_error_messages['email'] = 'Valid email is required';
    }
    if (!$name['is_valid']) {
        $form_error_messages['name'] = 'Valid name is required';
    }
    if (!$password['is_valid']) {
        $form_error_messages['password'] = "A valid password is required";
    }
    
    
    if (!$college['is_valid']) {
        $form_error_messages['college'] = "A valid college is required";
    }
    if (!$description['is_valid']) {
        $form_error_messages['description'] = "A valid description is required";
    }
    if (!$age['is_valid']) {
        $form_error_messages['age'] = 'Valid age is required';
    }
    if (!$gender['is_valid']) {
        $form_error_messages['gender'] = 'Gender required';
    }
    if (!$startAddress['is_valid']) {
        $form_error_messages['startAddress'] = 'Address required';
    }
    if (!$userType['is_valid']) {
        $form_error_messages['userType'] = "A valid user type is required";
    }
    if (!$available['is_valid']) {
        $form_error_messages['avail'] = "A valid available value required";
    }


# Display form
if (!$form_was_posted || count($form_error_messages) > 0) 
{

    $res->render('main', 'register', [
        'pageTitle' => 'Register',
        'form_error_messages' =>$form_error_messages
    ]);
}
else
    {
        
        $user = new User([
            'name' => $name['value'],
            'age' => $age['value'],
            'gender' => $gender['value'],
            'email' => $email['value'],
            'password' => $passwordhash,
            'college' => $college['value'],
            'description' => $description['value'],
            'user_type' => $userType['value'],
            'location' => $startAddress['value'],
            'available' => $available['value']
        ]);
        User::addUser($db, $user);

         if($userType['value'] == 'D')
         {
            $u = User::getUserByEmail($email['value'], $db);
            $user_id = $u->getUser_id();
            $res->redirect("/carDetails?user=$user_id");
             
            // $res->render('main', 'carDetails', [
            //     'pageTitle' => 'Car Details',
            //     'user' =>$user
            // ]);
         }
         else
         {
             
            $res->redirect('/home');

         }
    }
}
?>
