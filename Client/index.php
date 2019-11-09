<?php

  // Include the Rapid library
  require_once('lib/Rapid.php');

   //used for local host
   define ('SITE_BASE_DIR','/arc/Client');

  // Create a new Router instance
  $app = new \Rapid\Router();

  // Define some routes. Here: requests to / will be
  // processed by the controller at controllers/Home.php
  $app->GET('/home',      'Home');
  $app->GET('/login',     'LoginGet');
  $app->POST('/login',    'LoginPost');
  $app->GET('/passRegister',  'PassRegisterGet');
  $app->POST('/passRegister',  'PassRegisterPost');
  $app->GET('/driverRegister',  'DriverRegisterGet');
  $app->POST('/driverRegister',  'DriverRegisterPost');
  $app->GET('/userType',  'UserTypeGet');


  // Process the request
  $app->dispatch();

?>