<?php 
require 'config/database.php';

if(isset($_POST['submit'])){
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    if(!$title){
        $_SESSION['add-post']="Enter post title";
    }elseif(!$category_id){
        $_SESSION['add-post']="Select post category";
    }elseif(!$body){
        $_SESSION['add-post'] = "Enter post body";
    }elseif(!$thumbnail['name']){
        $_SESSION['add-post']="Choose post thumbnail";
    }else{
        $time = time();
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/'. $thumbnail_name;

        $allowed_files= ['png','jpg','jpeg'];
        $extention = explode('.',$thumbnail_name);
        $extention = end($extention);
        if(in_array($extention,$allowed_files)){
            if($thumbnail['size']<2_000_000){
                move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
            }else{
                $_SESSION['add-post'] = "Image file size is too large.";
            }
        }else{
            $_SESSION['add-post'] = "Invalid image format, allowed formats are: jpeg, png or jpg.";
        }
    }
    //back with form data if there is any problem
    if(isset($_SESSION['add-post'])){
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-post.php');
        die();
    }else{
        $query="INSERT INTO posts (title,body,thumbnail,category_id,author_id,is_featured) VALUES ('$title','$body','$thumbnail_name','$category_id','$author_id','$is_featured')";
        $result=mysqli_query($connection,$query);
        if(!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = "New post added successfully";
            header('location: '.ROOT_URL . 'admin/');
            die();
        }
    }
}
header('location: '.ROOT_URL.'admin/add-post.php');
die();

?>