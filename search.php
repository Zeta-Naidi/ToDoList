<?php
// PAGINA UTENTE
session_start();
@$email = ($_SESSION['email']);
@$password = $_SESSION['password'];

include 'conn.php';
if (LogInUtente($email, $password) == true) {
	$task_name = $_POST['task'];
	$category = $_POST['category'];
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
  </head>

  <body>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
      <h3 class="text-primary">To Do List App</h3>
      <hr style="border-top:1px dotted #ccc;" />
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <center>
          <form method="POST" class="form-inline" action="search.php">
            <input type="text" class="form-control" name="task" placeholder="Nome task" />
            <input type="text" class="form-control" name="category" placeholder="Categoria" />
            <button class="btn btn-primary form-control" name="search">search</button>
          </form>
        </center>
      </div>
      <br /><br /><br />
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Task</th>
            <th>Status</th>
            <th>Category
              <button onclick="location.href='orderbycategory.php'">></button>
            </th>
            <th>
              <center>Action</center>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = task_search($task_name, $category);
          $count = 1;
          foreach ($result as $elem) {
          ?>
            <tr>
              <td><?php echo $count++ ?></td>
              <td><?php echo $elem['task'] ?></td>
              <td><?php echo $elem['status_name'] ?></td>
              <td><?php echo $elem['category_name'] ?></td>
              <td colspan="2">
                <center>
                  <?php
                  if ($elem['status_name'] == "Done") {
                  } else {
                    echo '<a href="update_task.php?task_id=' . $elem['task_id'] . '" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
                  }
                  ?>
                  <a href="delete_query.php?task_id=<?php echo $elem['task_id'] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                </center>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    <div class="wrap">
      <button class="button_b" onClick="location.href='form_accedi.php'" type="button"></a>Sei un Admin? Accedi</button>
    </div> 
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
        <button class="button_b" onClick="location.href='logout.php'">Log out</button>
      </center>
  </body>

  </html>

<?php
} else
  echo 'Accesso negato'
?>