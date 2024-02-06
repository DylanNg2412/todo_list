<?php
  $database = connectToDB();

    $todo_label = $_POST["todo_label"];

    // do error checking and check if $todo_label is empty or not
    if ( empty( $todo_label ) ) {
      echo 'Please enter a task';
    } else {

      $sql = 'INSERT INTO todos (`label`,`user_id`) VALUES (:label,:user_id)';
      // 4.2 - prepare 
      $query = $database->prepare($sql);
      // 4.3 - execute
      $query->execute([
          'label' => $task_name,
          'user_id' => $_SESSION["user"]['id']
      ]);

   header("Location: home.php");
   exit;
  }

