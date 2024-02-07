<?php 

class Task
{
    function add()
    {

        $todo_label = $_POST["todo_label"];
    
        // do error checking and check if $todo_label is empty or not
        if ( empty( $todo_label ) ) {
            setError ("Please enter a task", "/");
        } else {

          // FUNCTIONAL METHOD :
        //   $database = connectToDB();
        //   $sql = 'INSERT INTO todos (`label`,`user_id`) VALUES (:label,:user_id)';
        //   // 4.2 - prepare 
        //   $query = $database->prepare($sql);
        //   // 4.3 - execute
        //   $query->execute([
        //       'label' => $todo_label,
        //       'user_id' => $_SESSION["user"]['id']
        //   ]);

        // OOP METHOD (using constructor method)
        $db = new DB(); // construct an object based on the class
        $db->add( 
            'INSERT INTO todos (`label`,`user_id`) VALUES (:label,:user_id)', 
            [
                  'label' => $todo_label,
                  'user_id' => $_SESSION["user"]['id']
            ] );
    
        header("Location: /");
        exit;
        }   

    }

    function delete()
    {

        // step 3: get student ID from the $_POST
        $todo_id = $_POST["todo_id"];
        
        // // step 1: list out all the database info
        // $database = connectToDB();

        // // step 4: delete the student from the database using student ID
        //     // 4.1 - sql command (recipe)
        //     $sql = "DELETE FROM todos where id = :id";
        //     // 4.2 - prepare (put everything into the bowl)
        //     $query = $database->prepare($sql);
        //     // 4.3 - execute (cook it)
        //     $query->execute([
        //         'id' => $todo_id
        //     ]);

        // OOP METHOD:
        $db = new DB();
        $db->delete(
            "DELETE FROM todos where id = :id",
            [
                'id' => $todo_id
            ]
        );
        
        // Step 5: redirect back to index.php
        header("Location: /");
        exit;
    }

    function update()
    {
        

        // step 3: get task id and completed is 0/1 from $_POST
        $todo_id = $_POST['todo_id'];
        $todo_completed = $_POST["todo_completed"];

        // // step 1: list out all the database info
        // $database = connectToDB();

        // // do error checking. Check if task is completed or not 
        // if ($todo_completed == 0) {
        //     $sql = "UPDATE todos SET completed = 1 WHERE id = :id";
        // } else if ($todo_completed == 1) {
        //     $sql = "UPDATE todos SET completed = 0 WHERE id = :id";
        // }

        // $query = $database->prepare($sql);

        // $query->execute([
        //     'id' => $todo_id,
        // ]);

        $db = new DB();
        if ($todo_completed == 0) {
            $sql = "UPDATE todos SET completed = 1 WHERE id = :id";
        } else if ($todo_completed == 1) {
            $sql = "UPDATE todos SET completed = 0 WHERE id = :id";
        }
        $db->update(
            $sql,
            [
                'id' => $todo_id,
            ]
        );

        header("Location: /");
        exit;

    }
}