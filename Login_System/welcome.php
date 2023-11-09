<?php
session_start();

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true)) {
    header("location:login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php $_SESSION['username']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>This is Welcome page</h1>
    <?php
    require 'partials/_nav.php';
    echo'this is welcome page<br>';
    ?>
    Welcome - <?php echo $_SESSION['username']?>
<div class="container">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome!</h4>
        <p>Aww yeah, you are in our website Welcome page. And you are login as UserName----- <?php echo $_SESSION['username']?> </p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to logout  <a href = "/Practice/Login_System/logout.php"> Using this link.</p>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>