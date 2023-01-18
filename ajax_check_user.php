<?php
require_once("config.php");

if(isset($_POST["username"])){
  $username=$_POST["username"];
  $id=$_POST["id"];
  $sql = "SELECT * FROM users WHERE username = '{$username}'";
  $res=mysqli_query($conn,$sql);
  if($res && mysqli_num_rows($res)>0){
    $success=false;
    $massage="Username Already Exists";
  }else{
   $success=true;
   $massage="Username Name Available";
  }
  echo json_encode(["success"=>$success,"message"=>$massage]);
}

if(isset($_POST["email"])){
  $email=$_POST["email"];
  $sql = "SELECT * FROM users WHERE email = '{$email}'";
  $res=mysqli_query($conn,$sql);
  if($res && mysqli_num_rows($res)>0){
    $success=false;
    $massage="Email Already Exists";
  }else{
   $success=true;
   $massage="Email Not Exist Done";
  }
  echo json_encode(["success"=>$success,"message"=>$massage]);
}



/******* delete user record *****/

if(isset($_POST["type"]) && $_POST["type"] =="delete"){
   $id=$_POST["id"];
  $sql = "SELECT * FROM users where id = $id";
  $res= mysqli_query($conn,$sql);
  if($res && mysqli_num_rows($res) >0){
    $row=mysqli_fetch_assoc($res);
    $profile_picture=$row["profile_picture"];
    if(file_exists("upload/".$profile_picture)){
      unlink("upload/".$profile_picture);
    }
    $sql1="DELETE FROM users WHERE id =$id";
    if(mysqli_query($conn,$sql1)){
     echo true; 
    }else{
      echo false;
    }
  }
  
}