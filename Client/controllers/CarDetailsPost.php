<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/User.php');
 $db = \Rapid\Database::getPDO();
 $form_was_posted = [];


$form_error_messages = [];

$form_was_posted = $req->body('name') !== NULL;


$make = FormUtils::getPostString($req->body('make'));
$model = FormUtils::getPostString($req->body('model'));
$colour = FormUtils::getPostString($req->body('colour'));
$seats =  FormUtils::getPostInt($req->body('seats'));
$payment = FormUtils::getPostString($req->body('payment'));
$avail = FormUtils::getPostString($req->body('available'));

     if (!$make['is_valid']) 
    {
        $form_error_messages['make'] = 'Valid make required';
    }
    if (!$model['is_valid']) 
    {
        $form_error_messages['model'] = 'Valid model required';
    }
    if (!$colour['is_valid']) 
    {
        $form_error_messages['colour'] = 'Valid colour required';
    }
    if (!$seats['is_valid']) {
        $form_error_messages['seats'] = 'Valid number of seats required';
    }
    if (!$payment['is_valid']) {
        $form_error_messages['payment'] = "A valid payment required";
    }
    if (!$avail['is_valid']) {
        $form_error_messages['available'] = "Yes or no is required for availability";
    }
    

# Display form
if (!$form_was_posted || count($form_error_messages) > 0) 
{

    $res->render('main', 'carDetails', [
        'pageTitle' => 'Car Details',
        'form_error_messages' =>$form_error_messages
    ]);
}
else
    {
        
        $car = new Car([
            
        ]);

        Car::addCar($db, $car);
        //$res->redirect('/home');
    }
}
?>
