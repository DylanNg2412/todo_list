<?php

   // step 1: list out all the database info
   $database = connectToDB();

  // step 3: get student ID from the $_POST
  $todo_label = $_POST["todo_label"];

  // step 4: delete the student from the database using student ID
    // 4.1 - sql command (recipe)
    $sql = "DELETE FROM todos where label = :label";
    // 4.2 - prepare (put everything into the bowl)
    $query = $database->prepare($sql);
    // 4.3 - execute (cook it)
    $query->execute([
        'label' => $todo_label
    ]);

  // Step 5: redirect back to home.php
  header("Location: home.php");
  exit;