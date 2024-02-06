<?php

 function connectToDB() {
   $host='devkinsta_db';
   $database_name = 'My_ToDo_List';
   $database_user = 'root';
   $database_password = 'sU3R6Rm2wtOI8xQA';

 $database = new PDO(
   "mysql:host=$host;dbname=$database_name",
   "$database_user",
   "$database_password"
 );
  
   return $database;
 }
 
// set error message
function setError( $error_message, $redirect_page ) {
    $_SESSION["error"] = $error_message;
    // redirect back to login page
    header("Location: " . $redirect_page );
    exit;
 }
 
