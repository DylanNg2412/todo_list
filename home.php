<?php



 $host = 'devkinsta_db';
   $database_name = 'My_ToDo_List';
   $database_user = 'root';
 $database_password = 'sU3R6Rm2wtOI8xQA';

 $database = new PDO(
    "mysql:host=$host;dbname=$database_name",
    "$database_user",
    "$database_password"
 );

 $sql = "SELECT * FROM todos";
   $query = $database->prepare($sql);
   $query->execute();
   $todos = $query -> fetchAll();

?>


<!DOCTYPE html>
<html>
  <head>
    <title>TODO App</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>
    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <?php if ( isset( $_SESSION["user"] ) ) : ?>
          
        <ul class="list-group">
          <?php foreach ( $todos as $todo): ?>
          <li
            class="list-group-item d-flex justify-content-between align-items-center"
          >
          <!-- Update Task-->
          <form method="POST" action="update_task.php">
            <input
            type="hidden"
            name="todo_completed"
            value="<?= $todo["completed"]; ?>"
            />
            <input
            type="hidden"
            name="todo_id"
            value="<?= $todo["id"]; ?>"
            />
            <?php if ($todo["completed"] == 0):?>                        
              <button class="btn btn-sm btn-light">
                <i class="bi bi-square"></i>
              </button>
              <span><?= $todo['label'];?></span>              
              <?php else : ?>              
              <button class="btn btn-sm btn-success">
                <i class="bi bi-check-square"></i>
              </button>
              <span class="ms-2 text-decoration-line-through"><?= $todo['label'];?></span>
              <?php endif; ?>
           </form>

            <!-- Delete Task -->            
            <form method="POST" action="delete_task.php">              
                <input 
                  type="hidden"
                  name="todo_label"
                  value="<?= $todo["label"]; ?>" 
                  />           
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>            
            </form>
          </li>
          <?php endforeach; ?>
        </ul>
        
        <?php endif; ?>

        <?php if ( isset( $_SESSION["user"] ) ) : ?>
        <div class="mt-4">
          <form method="POST" action="add_tasks.php" class="d-flex justify-content-between ">
            <input
              type="text"
              class="form-control"
              placeholder="Add new item..."
              name="todo_label"
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </form>
        </div>
        <?php else : ?>
          <div class="d-flex justify-content-center ">
            <a href="/login" class="btn btn-link" id="login">Login</a>
            <a href="/signup" class="btn btn-link" id="signup">Sign Up</a>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if ( isset( $_SESSION["user"] ) ) : ?>
    <div class="d-flex justify-content-center">
        <a href="/logout" class="btn btn-link p-0" id="login">Logout</a>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
