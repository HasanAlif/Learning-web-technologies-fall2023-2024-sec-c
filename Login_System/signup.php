<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    include 'partials/_DBConnect.php';
    $username= $_POST["username"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];

    $existSql= "SELECT * FROM `users` WHERE username = '$username'";
    $result= mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows> 0){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed !!</strong> UserName Already Exixts!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    else{
    
    if($password==$cpassword){

        $hash=password_hash($password, PASSWORD_DEFAULT);

        $sql="INSERT INTO `users` ( `username`, `password`, `Tstamp`) VALUES ('$username', '$hash', CURRENT_TIME())";
        $result=mysqli_query($conn,$sql);
        if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !!</strong> Your account is now created and you can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

    }
    else{
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed !!</strong> Your account is failed to create because of Username or password issue.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
}


}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>This is Signup page</h1>
    <?php
    require 'partials/_nav.php';
    
    ?>
    
    <div class="container">

    <h1 class="text-center" >Signup To Our Website</h1>

    <form action="/Practice/Login_System/signup.php"method="post">
  <div class="form-group col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"> </div>
  </div>
  <br>
  <div class="form-group col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password"name="password">
  </div>
  <br>
  <div class="form-group col-md-6">
    <label for="password" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="password"name="cpassword">
  </div>
  <br><br>
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>