<?php
  $host = 'devkinsta_db';
  $database_name = 'My_ToDo_List';
  $database_user = 'root';
  $database_password = 'sU3R6Rm2wtOI8xQA';

    $database = new PDO(
     "mysql:host=$host;dbname=$database_name",
     $database_user,
     $database_password
   );

    $todo_label = $_POST["todo_label"];

    // do error checking and check if $todo_label is empty or not
    if ( empty( $todo_label ) ) {
      echo 'Please enter a task';
    } else {

    $sql = 'INSERT INTO todos(`label`) VALUES (:label)';

    $query = $database ->prepare($sql);

    $query-> execute([
        'label' => $todo_label
    ]);

   header("Location: index.php");
   exit;
  }

