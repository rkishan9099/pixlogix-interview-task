<?php require_once("header.php");
$id=$username=$email=$address=$old_img=$country=$state=$gender=$mobile=$date_of_birth="";
$hobbies=[];

if(isset($_GET["id"])){
  $id=$_GET["id"];
  $sql = "SELECT * FROM users WHERE id =$id";
  $res=mysqli_query($conn,$sql);
  if($res && mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res);
    $username=$row["username"];
    $email=$row["email"];
    $gender=$row["gender"];
    $hobbies=explode(",",$row["hobbies"]);
    $address=$row["address"];
    $old_img=$row["profile_picture"];
    $country=$row["country"];
    $state=$row["state"];
    $mobile=$row["mobile"];
    $date_of_birth=$row["date_of_birth"];
   
  }else{
    header("Location: index.php");
    exit;
  }
}

/*** if errors exist in session set old value to the form fields***/
if ($_SESSION["errors"]) {
  $oldVal = $_SESSION["old_val"];
  $username = $oldVal["username"];
  $email = $oldVal["email"];
  $gender = $oldVal["gender"];
  $address = $oldVal["address"];
  $country = $oldVal["country"];
  $state = $oldVal["state"];
  $id = $oldVal["id"];
  $old_img=$oldVal["old_image"];
  $mobile=$oldVal["mobile"];
  $date_of_birth=$oldVal["date_of_birth"];
}
if(isset($oldVal["hobbies"])){
  $hobbies=  $oldVal["hobbies"];
  }
/**** id not null url is update other wise insert data ***/
if($id!=""){
  $title="Edit User";
    $form_submit_url="add_edit_submit.php?id=".$id;
}else{
  $title="Add User";
  $form_submit_url="add_edit_submit.php";
}

?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h1><?= $title ?></h1>
    </div>
    <div class="card-body">
      <form action="<?= $form_submit_url ?>" enctype="multipart/form-data" method="post">
        <div class="form-row">
          <div class="col-md-6 col-12 mb-2">
            <label for="username">Username</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?= $username ?>" required >
            <strong class="text-danger username_msg" >
              <?= isset($_SESSION["errors"]["username"])? $_SESSION["errors"]["username"] : "" ?>
            </strong>
          </div>
          <div class="col-md-6 col-12 mb-2">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Enter Email.." value="<?= $email ?>" required>
            <strong class="text-danger email_msg">
              <?= isset($_SESSION["errors"]["email"])? $_SESSION["errors"]["email"] : "" ?>
            </strong>
          </div>
          <div class="col-md-6 col-12 mb-2">
            <label for="mobile">Mobile</label>
            <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Enter Mobile.." value="<?= $mobile ?>" required>
            <strong class="text-danger mobile_msg">
              <?= isset($_SESSION["errors"]["mobile"])? $_SESSION["errors"]["mobile"] : "" ?>
            </strong>
          </div>
          <div class="col-md-6 col-12 mb-2">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" class="form-control" name="date_of_birth" placeholder="Enter Don.." value="<?= $date_of_birth ?>" required>
            <strong class="text-danger ">
              <?= isset($_SESSION["errors"]["date_of_birth"])? $_SESSION["errors"]["date_of_birth"] : "" ?>
            </strong>
          </div>
          <div class="col-6 mt-2 mb-2 border">
            <div class="d-flex align-items-center">
              <label for="gender">Gender &nbsp;</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" <?= $gender=="Male" ? 'checked': '' ?> required>
                  <label class="form-check-label" for="Male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="Female" value="Female"  <?= $gender=="Female" ? 'checked': '' ?> required>
                  <label class="form-check-label" for="Female">Female</label>
                </div>
              </div>
            </div>
            <strong class="text-danger">
              <?= isset($_SESSION["errors"]["gender"])? $_SESSION["errors"]["gender"] : "" ?>
            </strong>
          </div>
          <div class="col-6 mt-2 mb-2 border ">
            <div class="d-flex align-items-center">
              <label for="hobbies">Hobbies:- &nbsp;</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="hobbies[]" id="reading" value="Reading"
                  <?= in_array("Reading",$hobbies) ? "checked" :'' ?>
                  >
                  <label class="form-check-label" for="reading">Reading</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="hobbies[]" id="Singing" value="Singing"
                 <?= in_array("Singing",$hobbies) ? "checked" :'' ?>
                                    >
                  <label class="form-check-label" for="Singing">Singing</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="hobbies[]" id="Programing" value="Programing"
                   <?= in_array("Programing",$hobbies) ? "checked" :'' ?>>
                  <label class="form-check-label" for="Programing">Programing</label>
                </div>
              </div>
            </div>
            <strong class="text-danger">
              <?= isset($_SESSION["errors"]["hobbies"])? $_SESSION["errors"]["hobbies"] : "" ?>
            </strong>

          </div>
          <div class="col-md-6 col-12">
            <label for="country">Country</label>
        <select name="country" id="country" class="form-control" data-state="<?= $state ?>" >
              <?php 
              $sql_country="SELECT * FROM country";
              $res_country=mysqli_query($conn,$sql_country);
       while($list=mysqli_fetch_assoc($res_country)){
         if($list["id"]==$country){
           echo '<option value="'.$list['id'].'" selected>'.$list["country_name"].'</option>';
         }else{
                      echo '<option value="'.$list['id'].'" >'.$list["country_name"].'</option>';
         }
   
              }
              ?>
            </select>
            <strong class="text-danger">
              <?= isset($_SESSION["errors"]["country"])? $_SESSION["errors"]["country"] : "" ?>
            </strong>
          </div>
          <div class="col-md-6 col-12">
            <label for="state">State</label>
            <select name="state" id="state" class="form-control" >
              <option value=""></option>
            </select>
            <strong class="text-danger">
              <?= isset($_SESSION["errors"]["state"])? $_SESSION["errors"]["state"] : "" ?>
            </strong>
          </div>
          <div class="col-12 mt-2 mb-2">
            <label for="address">Adress</label>
            <textarea name="address" class="form-control" required><?= $address ?></textarea>
            <strong class="text-danger">
              <?= isset($_SESSION["errors"]["address"])? $_SESSION["errors"]["address"] : "" ?>
            </strong>
          </div>
          <div class="col-12">
            <input type="hidden" name="old_image" value="<?= $old_img ?>">
            <label for="profile_picture">
              Profile Picture
            </label>
            <input type="file" name="profile_picture" class="form-control">
            <strong class="text-danger">
              <?= isset($_SESSION["errors"]["profile_picture"])? $_SESSION["errors"]["profile_picture"] : "" ?>
            </strong>
          </div>
        </div>
        <button class="btn btn-primary mt-2" id="save_btn" >Save</button>
      </from>
    </form>
  </div>
</div>
</div>
<?php
/****** After Error show session unset for not showing error when page is reload ****/

unset($_SESSION["old_val"]);
unset($_SESSION["errors"]);
require_once("footer.php"); ?>