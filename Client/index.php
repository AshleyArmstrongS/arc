<?php

  // Include the Rapid library
  require_once('lib/Rapid.php');

   //used for local host
   define ('SITE_BASE_DIR','/arc/Client');

   $config =\Rapid\ConfigFile::getContent();

  // Create a new Router instance
  $app = new \Rapid\Router();

  try{
  // Define some routes. Here: requests to / will be
  // processed by the controller at controllers/Home.php
  $app->GET('/home',      'Home');
  $app->GET('/login',     'LoginGet');
  $app->POST('/login',    'LoginPost');
  $app->GET('/inbox',  'InboxGet');
  //$app->POST('/inbox',  'InboxPost');
  $app->GET('/message',  'messageGet');
  $app->POST('/message',  'messagePost');
  $app->GET('/removeMessage',  'removeMessage');
  $app->GET('/register',  'registerGet');
  $app->POST('/register',  'registerPost');
  $app->GET('/carDetails',  'CarDetailsGet');
  $app->POST('/carDetails',  'CarDetailsPost');
  $app->GET('/userType',  'UserTypeGet');
  $app->GET('/viewUser',   'ViewAllUsers');
  $app->GET('/logout',  'Logout');


  // Process the request
  $app->dispatch();
  }
  catch(\Rapid\RouteNotFoundException $e){
    $res =  $e->getResponseObject();
    $res->render('main', '404', []);
 
 }
 
?>