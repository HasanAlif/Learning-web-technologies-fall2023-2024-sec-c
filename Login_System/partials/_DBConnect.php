<?php

$servername="localhost";
$username= "root";
$password= "";
$dbname= "user";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Sorry failed to connect ". mysqli_connect_error());

}
else{
    //echo"Connection was succesfull!";
}

?>