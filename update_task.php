<?php

// step 1: list out all the database info
$host = 'devkinsta_db';
$database_name = 'My_ToDo_List';
$database_user = 'root';
$database_password = 'sU3R6Rm2wtOI8xQA';

// Step 2: connect to the database
$database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    $database_user,
    $database_password
);

// step 3: get task id and completed is 0/1 from $_POST
$todo_id = $_POST['todo_id'];
$todo_completed = $_POST["todo_completed"];

// do error checking. Check if task is completed or not 
if ($todo_completed == 0) {
    $sql = "UPDATE todos SET completed = 1 WHERE id = :id";
} else if ($todo_completed == 1) {
    $sql = "UPDATE todos SET completed = 0 WHERE id = :id";
}

$query = $database->prepare($sql);

$query->execute([
    'id' => $todo_id,
]);

header("Location: index.php");
exit;
