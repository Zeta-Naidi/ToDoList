<?php
#LOGIN ADMIN
include 'conn.php';
session_start();
if(isset($_POST['email']) && LogInAdmin($_POST['email'], $_POST['password'])){
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: admin_page.php');
  }

?>

<html>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<link rel="stylesheet" type="text/css" href="./css/style.css" />

<head>
    <title>Accedi</title>
</head>

<body style="text-align:center;">
    <h3 style="text-align:center;">Accedi all'area ADMIN</h3>


    <!-- FORM -->
    <form action="?" method="post">

        <?php
?>


        <p>Email:<br /><input id="email" name="email" type="text" placeholder="utente_admin@gmail.com" /></p>
        <p>Password:<br /><input id="password" name="password" type="password" placeholder="password_admin" /></p>
        <input id="controlla" name="controlla" type="hidden" value="si" />
        <button class="button_a" name="Submit" type="submit" value="Accedi">ACCEDI</button>

    </form>

</body>

</html>