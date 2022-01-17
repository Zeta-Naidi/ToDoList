<?php
#LOGIN 
include 'conn.php';
session_start();
if (isset($_POST['email']) && LogInUtente($_POST['email'], $_POST['password'])) {
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];
  header('Location: page_utente.php');
}


if (@$_GET['admin'] == true) {
  header("Location: admin_page.php");
}

if (@$_GET['logout'] == "si") {
  header("Location: index.php");
}

?>
<?php

?>
<html>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<link rel="stylesheet" type="text/css" href="./css/style.css" />

<head>
  <title>Accedi</title>
</head>

<body style="text-align:center;">
  <h3 style="text-align:center;">Accedi all'area Utenti</h3>


  <!-- FORM -->
  <div>
    <form action="?" method="post">

      <p>Email:<br /><input id="email" name="email" type="text" placeholder="utente@gmail.com" /></p>
      <p>Password:<br /><input id="password" name="password" type="password" placeholder="password" /></p>
      <button class="button_a" name="Submit" type="submit" value="Accedi">ACCEDI</button>
    </form>
  </div>

  <!-- FINE FORM -->

  <div class="wrap">
    <button class="button_b" onClick="location.href='form_accedi.php'" type="button"></a>Sei un Admin? Accedi</button>
  </div>
</body>

</html>