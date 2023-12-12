<?php 

require 'config/database.php';


//get signup form data if signup button was clicked
if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    
    //validate input values
    if(!$firstname){
        $_SESSION['signup'] = "Please Enter your First Name";
    }elseif(!$lastname){
        $_SESSION['signup'] = "Please Enter your Last Name";
    }elseif(!$username){
        $_SESSION['signup'] = "Please Enter your Username";
    }elseif(!$email){
        $_SESSION['signup'] = "Please Enter a valid mail";
    }elseif(strlen($createpassword)<8 || strlen($confirmpassword)<8 ){
        $_SESSION['signup'] = "password should be 8+ characters";
    }elseif(!$avatar){
        $_SESSION['signup'] = "Please add a profile image";
    }else{
        //check if password don't match
        if($createpassword !== $confirmpassword){
            $_SESSION['signup'] = "password do not match";
        }else{
            //hash password
            $hashed_password = password_hash($createpassword,PASSWORD_DEFAULT);
            
            // check if username or email already exist
            $uer_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $uer_check_result = mysqli_query($connection,$uer_check_query);
            if (mysqli_num_rows($uer_check_result)>0) {
                $_SESSION['signup']="Username or Email is already taken.";
            }else{
                // upload avatar to server folder
                $time = time();  //make each image name unique using current timestamp.
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/'.$avatar_name;

                //make sure file is an image
                $allowed_files = ['png','jpg','jpeg'];
                $extention = explode('.' , $avatar_name);
                $extention = end($extention);
                if(in_array($extention,$allowed_files)){
                    //make sure image is not too large (1mb+)
                    if ($avatar['size'] < 1048576) {
                        //upload avatar
                        move_uploaded_file($avatar_tmp_name,$avatar_destination_path);
                    }else{
                        $_SESSION['signup'] = 'File size too big. It should be less than 1 mb';
                    }
                }else{
                    $_SESSION['signup']= 'Invalid Image File! Only png, jpg and jpeg are allowed';
                }
            }
        }
    }

    //back to signup page if there was any problem
    if(isset($_SESSION['signup'])) {
        $_SESSION['signup-data']=$_POST; //pass form data back to signup page
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    }else{
        //save user data in database
        $insert_user_query = "INSERT INTO `users` SET firstname = '$firstname',lastname = '$lastname',username = '$username',email = '$email',password = '$hashed_password',avatar = '$avatar_name',is_admin = 0";

        $insert_user_result = mysqli_query($connection,$insert_user_query);

        if(!mysqli_errno($connection)){
            $_SESSION['signup-success'] = "Registration successful. please log in ! ";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }
}
else{
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}


?>