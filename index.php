<?php

session_start();

$path = $_SERVER["REQUEST_URI"];

$path = trim( $path, '/');

// IF ELSE FORMAT
// if ($path == 'login') {
//   require 'login.php';
// } else if ($path == 'signup') {
//   require 'signup.php';
// } else if ($path == 'logout') {
//   require 'logout.php';
// } else {
//   require 'home.php';
// } 


// Switch Case Format
switch ($path) {
  case 'login':
    require 'login.php';
    break;
  case 'signup':
    require 'signup.php';
    break;
  case 'logout':
    require 'logout.php';
    break;
  default:
    require 'home.php':
    break;      
}