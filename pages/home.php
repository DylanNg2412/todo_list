<?php


$database = connectToDB();
 
 $sql = "SELECT * FROM todos WHERE user_id = :user_id";
   $query = $database->prepare($sql);
   $query->execute([
    'user_id' => isset( $_SESSION["user"]['id'] ) ? $_SESSION["user"]['id'] : ''
  ]);
   $todos = $query -> fetchAll();

?>

<?php require "parts/header.php"; ?>
    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <?php if ( isset( $_SESSION["user"] ) ) : ?>
        <?php require "parts/error_box.php"; ?>  
        <ul class="list-group">
          <?php foreach ( $todos as $todo): ?>
          <li
            class="list-group-item d-flex justify-content-between align-items-center"
          >
          <!-- Update Task-->
          <form method="POST" action="/tasks/update">
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
            <form method="POST" action="/tasks/delete">              
                <input 
                  type="hidden"
                  name="todo_id"
                  value="<?= $todo["id"]; ?>" 
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
          <form method="POST" action="/tasks/add" class="d-flex justify-content-between ">
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

<?php require "parts/footer.php"; ?>
