<?php
// PAGINA ADMIN
session_start();
@$email = ($_SESSION['email']);
@$password = $_SESSION['password'];

include 'conn.php';
if (LogInAdmin(@$email, @$password)) {

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
    </head>

<body>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">ADMIN PAGE</h3>
        <hr style="border-top:1px dotted #ccc;" />
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <center>
                <form method="POST" class="form-inline" action="add_query.php">
                    <input type="text" class="form-control" name="task" required placeholder="task name" />
                    <input type="text" class="form-control" name="category" required placeholder="category" />
                    <input type="text" class="form-control" name="status" required placeholder="status" />
                    <input type="Submit" class="btn btn-primary form-control" name="add" value="Add Task">
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
                    <th>Category</th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = task_all();
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
                                <a href="delete_query_a.php?task_id=<?php echo $elem['task_id'] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </center>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div>
        <center>
        <button class="button_b" onClick="location.href='logout.php'">Log out</button>
        </center>
    </div>
</body>

</html>
<?php
} else
  echo 'Accesso negato'
?>