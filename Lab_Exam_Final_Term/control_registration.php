<?php

$servername="localhost";
$username= "root";
$password= "";
$dbname= "registration";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){
    
    echo"Connection successful";
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    
    $employee_name= $_POST["ename"];
    $contact_number= $_POST["cnumber"];
    $username=$_POST["uname"];
    $password= $_POST["psw"];

    $Sql= "INSERT INTO `client` (`Employee_Name`, `Contact_no`, `User_Name`, `Password`) VALUES ('$employee_name', '$contact_number', '$username', '$password');";
    $result= mysqli_query($conn,$Sql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows> 0){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed !!</strong> UserName Already Exixts!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    
}




?>