<?php

// step 1: list out all the database info
$database = connectToDB();

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

header("Location: home.php");
exit;
