<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/User.php');
 require('./models/Location.php');
 require_once('./lib/phpmailer/PHPMailerAutoload.php');
 $db = \Rapid\Database::getPDO();
 $req->sessionStart();
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

    // List of allowed domains
    $allowed = [
    'student.dkit.ie'
    ];

    // Separate string by @ characters (there should be only one)
    $parts = explode('@', $email['value']);

    // Remove and return the last part, which should be the domain
    $domain = array_pop($parts);

    // Check if the domain is in our list
    if ( ! in_array($domain, $allowed))
    {
        $form_error_messages['email'] = 'Email does not match a valid college';
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
        // reference = https://www.codeofaninja.com/2014/06/google-maps-geocoding-example-php.html
        $encodedAddress = urlencode($startAddress['value']);
        $url = "http://www.mapquestapi.com/geocoding/v1/address?key=lGfENtxACv5ANHh2UWvVkWnnmMRJFHVA&outFormat=json&location=$encodedAddress";

        $resopnse_json = file_get_contents($url);
        $decoded_response = json_decode($resopnse_json, true);

        $results = $decoded_response['results'];
        $latitude = $results[0]["locations"][0]["latLng"]["lat"];
        $longitude = $results[0]["locations"][0]["latLng"]["lng"];

        $location = new Location([
            'address' => $startAddress['value'],
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);

        Location::addLocation($db, $location);
        $location_id = Location::returnLocation_idByAddress($db, $startAddress['value']);


        $user = new User([
            'name' => $name['value'],
            'age' => $age['value'],
            'gender' => $gender['value'],
            'email' => $email['value'],
            'password' => $passwordhash,
            'college' => $college['value'],
            'description' => $description['value'],
            'user_type' => $userType['value'],
            'location_id' => $location_id[0],
            'available' => $available['value']
        ]);
        
        User::addUser($db, $user);
        $req->sessionSet('Email',$email['value']);
        $u = User::getUserByEmail(($_SESSION['Email']), $db);
        $user_id = $u->getUser_id();
        $req->sessionSet('Name',$name['value']);
        $req->sessionSet('Id', $user_id);
        $req->sessionSet('Type', $userType['value']);
        

        //generating code
        $random = substr(number_format(time() * rand(),0,'',''),0,10);
        $req->sessionSet('Code', $random);

        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port ='465';
        $mail->isHTML();
        $mail->Username='gocollege2019@gmail.com';
        $mail->Password='iqrtrigztghkykkl';
        $mail->SetFrom('gocollege2019@gmail.com');
        $mail->Subject = 'GoCollege Sign Up';
        $mail->Body ="Welcome " .$name['value']. ", Thanks for signing up to go college. Here is your authentication number: " .$random.". Regards GoCollege Team";
        $mail->AddAddress($email['value']);
        
        $mail->Send();
        
        

        $res->redirect('/authUser');

    }
        
    
}?>