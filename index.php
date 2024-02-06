<?php

  // start session
  session_start();

  // require the functions.php file
  require "includes/functions.php";
  require "includes/task-auth.php";
  require "includes/task-user.php";


  $path = $_SERVER["REQUEST_URI"];
  // trim out the beginning slash
  $path = trim( $path, '/' );

  // init classes
  $auth = new Authentication();
  $task = new User();

  // simple router system - deciding what page to load based on the url
  // Routes
  switch ( $path ) {
    // action routes
    case 'auth/login':
      $auth->login();
      break;
    case 'auth/signup':
      $auth->signup();
      break;
    case 'tasks/add':
      $task->add();
      break;
    case 'tasks/update':
      $task->update();
      break;
    case 'tasks/delete':
      $task->delete();
      break;

    // page routes
    case 'login':
      require 'pages/login.php';
      break;
    case 'signup':
      require 'pages/signup.php';
      break;
    case 'logout':
      $auth->logout();
      break;
    default:
    $page_title = "Home Page";
      require 'pages/home.php';
      break;
  }
