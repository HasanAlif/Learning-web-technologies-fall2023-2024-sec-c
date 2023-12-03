<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    include 'partials/_DBConnect.php';
    $username= $_POST["username"];
    $password= $_POST["password"];
    
    

        //$sql="select * from users where username='$username' AND password='$password'";
        $sql="select * from users where username='$username' ";
        $result=mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        if($num==1){
          while( $row=mysqli_fetch_array($result)){
            if(password_verify($password,$row["password"])){
             
            $login=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header('location:welcome.php');
        }
        else{
          $showError="Invalid User";
      }
      }
    }
        else{
            $showError="Invalid User";
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
    <h1>This is Login page</h1>
    <?php
    
    
    ?>
    <?php
    if($login){

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !!</strong> You successfully loged In.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed !!</strong> Invalid User..
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>
    
    <div class="container">

    <h1 class="text-center" >Login To Our Website</h1>

    <form action="/Practice/Login_System/login.php"method="post">
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
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>