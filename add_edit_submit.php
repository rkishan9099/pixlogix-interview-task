<?php
require_once("config.php");
//prx($_REQUEST[]=="post");
unset($_SESSION["old_val"]);
unset($_SESSION["errors"]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hobbies = "";
  $gender = "";
  $id = "";

  if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
  }
  /**** Check hobbies Selected pr not ****/
  if (isset($_POST["hobbies"])) {
    $hobbies = implode(",", $_POST["hobbies"]);
  }

  if (isset($_POST["gender"])) {
    $gender = $_POST["gender"];
  }
 
 
 
  $username = input_validation($_POST["username"], "username");
  $email = input_validation($_POST["email"], "email");
  $mobile = input_validation($_POST["mobile"], "mobile");
  $date_of_birth = input_validation($_POST["date_of_birth"], "date_of_birth");
  $country = input_validation($_POST["country"], "country");
  $state = input_validation($_POST["state"], "state");
  $address = input_validation($_POST["address"], "address");
  $hobbies = input_validation($hobbies, "hobbies");
  $gender = input_validation($gender, "gender");
 $imagename = $_POST["old_image"];
  /****** image Upload *****/
  if (isset($_FILES["profile_picture"]["name"]) && $_FILES["profile_picture"]["name"] != "") {
    if(file_exists("upload/".$imagename)){
      unlink("upload/".$imagename);
    }
    $allowed_ext = ["jpg",
      "jpeg",
      "png",
      "svg"];
    $file_name = $_FILES["profile_picture"]["name"];
    $tmp_name = $_FILES["profile_picture"]["tmp_name"];
    $file_ext = end(explode(".", $_FILES["profile_picture"]["name"]));
    $upload_path = "upload/";
    $imagename = time().'-'.$file_name;
    if (in_array($file_ext, $allowed_ext)) {
      move_uploaded_file($tmp_name, $upload_path.$imagename);
    } else {
      $_SESSION["errors"]["profile_picture"] = "Please Upload valid File Expected file is (jpg,jpeg,png,svg)";
      header("Location :". $_SERVER['HTTP_REFERER']);
      exit;
    }
  }

  /***** *****
  if id is present than data update other wise data insert
  if id is not present than image is required
  ******/
  if ($id != "") {
    $sql = "UPDATE users SET username= '{$username}', email = '{$email}', mobile='{$mobile}',date_of_birth='{$date_of_birth}',profile_picture='{$imagename}', state='{$state}', country='{$country}',address='{$address}',gender='{$gender}',hobbies='{$hobbies}' WHERE id = {$id}";
    $res = mysqli_query($conn, $sql) or die("qery failed");
    $message = "Record Update Successfully";
  } else {
    $imagename = input_validation($imagename, "profile_picture");
    $sql = "INSERT INTO `users`(`username`, `email`, `mobile`, `profile_picture`, `state`, `country`, `address`, `gender`, `hobbies`,date_of_birth) VALUES ('{$username}','{$email}','{$mobile}','{$imagename}','{$state}','{$country}','{$address}','{$gender}','{$hobbies}','{$date_of_birth}')";
    $res = mysqli_query($conn, $sql) or die($sql);
    $message = "Record Added Successfully";
  }
  if ($res) {
    $_SESSION["message"] = $message;
    header("Location: index.php");
  }
}


/***** input validation ***/
function input_validation($input, $input_feild_name) {
  if ($input !== "") {
    $input = trim($input);
    $input = htmlspecialchars($input);
    if ($input_feild_name == "email") {
      if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errors"][$input_feild_name] = "Enter Valid Email  Address";
      }
    }
    return $input;
  } else {
    $_SESSION["old_val"] = $_REQUEST;
    $_SESSION["errors"][$input_feild_name] = "$input_feild_name is Required";
    header("Location :". $_SERVER['HTTP_REFERER']);
    exit;
  }
}