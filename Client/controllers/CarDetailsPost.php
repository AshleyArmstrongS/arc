<?php return function($req, $res) {
    $user_id = $req->query('user');
    require('./lib/FormUtils.php');
    require('./models/Car.php');
    require('./models/User.php');
    $db = \Rapid\Database::getPDO();
    $req->sessionStart();
    $form_was_posted = [];


    $form_error_messages = [];

    $form_was_posted = $req->body('make') !== NULL;

    $driver_id = FormUtils::getPostInt($req->query('user'));
    $make = FormUtils::getPostString($req->body('make'));
    $model = FormUtils::getPostString($req->body('model'));
    $colour = FormUtils::getPostString($req->body('colour'));
    $seats = FormUtils::getPostInt($req->body('seats'));
    $payment = FormUtils::getPostString($req->body('payment'));

    if (!$make['is_valid']) {
        $form_error_messages['make'] = 'Valid make required';
    }
    if (!$model['is_valid']) {
        $form_error_messages['model'] = 'Valid model required';
    }
    if (!$colour['is_valid']) {
        $form_error_messages['colour'] = 'Valid colour required';
    }
    if (!$seats['is_valid']) {
        $form_error_messages['seats'] = 'Valid number of seats required';
    }
    if (!$payment['is_valid']) {
        $form_error_messages['payment'] = "A valid payment required";
    }

    

# Display form
    if (!$form_was_posted || count($form_error_messages) > 0) {

        $res->render('main', 'carDetails', [
            'pageTitle' => 'Car Details',
            'form_error_messages' => $form_error_messages
        ]);
    } 
    else 
    {

        $car = new Car([
            'driver_id' => $driver_id['value'],
            'estimated_pay' => $payment['value'],
            'make' => $make['value'],
            'colour' => $colour['value']
        ], $db);
       

        
        //print_r($car);
        Car::addCar($car, $db);

        $req->sessionSet('LOGGED_IN',TRUE);
        $res->redirect('/');
    }
}
?>