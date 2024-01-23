<?php
 // Step 1: list out all tje database info
 $host = 'devkinsta_db';
 $database_name = 'My_ToDo_List';
 $database_user = 'root';
 $database_password = 'sU3R6Rm2wtOI8xQA';

 
 // Step 2: Connect to the database to PHP
 $database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    "$database_user",
    "$database_password"
 );

  // Step #3: Get all the data from the form using $_POST
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  //Step #4: make sure all the the fields are not empty (error checking)
  // 4.1: make sure all fields are filled
  if(empty($name)|| (empty($email)) || (empty($password)) || (empty($confirm_password))) {
      echo "All the fields are required";
  } else if ( $password !== $confirm_password) {
    //4.2 - make sure password does match
     echo "The password does not match";
  } else if ( strlen($password) < 8 ) {
    //4.3 - make sure password is more than 8 characters
    echo "Password must be at least 8 characters long.";
  }

  //Step #5: create the user account
      // 5.1 - sql command
      $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)";
      // 5.2 - prep
      $query = $database -> prepare($sql);
      // 5.3 - execute
      $query->execute([
       'name'  => $name,
       'email' => $email,
       'password' => password_hash( $password, PASSWORD_DEFAULT ) 
      ]);
    
  // Step #6: redirect back to login.php
    header("Location: login.php");
    exit;    
     

?>