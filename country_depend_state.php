<?php
require_once("config.php");

if(isset($_POST["coutry_id"])){
  $coutry_id=$_POST["coutry_id"];
  $stateId=$_POST["stateId"];
  $sql="SELECT * FROM `state` WHERE country_id= '{$coutry_id}'";
  $res=mysqli_query($conn,$sql) or die('qjjsjsjj');
  while($row=mysqli_fetch_assoc($res)){
  ?>
    <option value="<?= $row['id'] ?>" <?= $stateId ===$row['id'] ? 'selected':'' ?>><?= $row['state_name'] ?></option>
<?php  }
}