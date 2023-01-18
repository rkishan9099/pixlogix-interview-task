<?php
require_once("header.php");
if(isset($_GET["id"])){
  $id = $_GET["id"];
} 
$sql = "SELECT users.*,country.country_name,state.state_name FROM users INNER JOIN country ON users.country = country.id INNER JOIN state ON users.state = state.id
WHERE users.id = $id";
$res=mysqli_query($conn,$sql);
if($res && mysqli_num_rows($res)>0){
  $row=mysqli_fetch_assoc($res);

}else{
//  header("Location: index.php");
  exit;
}

?>

<div class="container-fluid   ">
  <div class="card">
<div class="row mt-4">
  <div class="col-md-4 col-12 bg-warning p-2">
    <img src="upload/<?= $row['profile_picture'] ?>" alt="" class="img-fluid img-thumbnail">
  </div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header bg-warning">
        <h2>User Details</h2>
      </div>
      <div class="card-body">
        <table class="table table-borderd">
         <tr>
           <th>Username</th>
           <td><?= $row["username"] ?></td>
         </tr>
         <tr>
           <th>Email</th>
           <td><?= $row["email"] ?></td>
         </tr>
         <tr>
           <th>Gender</th>
           <td><?= $row["gender"] ?></td>
         </tr>
         <tr>
           <th>DOB</th>
           <td><?= $row["date_of_birth"] ?></td>
         </tr>
         <tr>
           <th>Hobbies</th>
           <td><?= $row["hobbies"] ?></td>
         </tr>
         <tr>
           <th>Address</th>
           <td><?= $row["address"] ?></td>
         </tr>
         <tr>
           <th>State</th>
           <td><?= $row["state_name"] ?></td>
         </tr>
         <tr>
           <th>Country</th>
           <td><?= $row["country_name"] ?></td>
         </tr>
        </table>
      </div>
    </div>
  </div>
</div>
    
  </div>
<?php
require_once("footer.php");
?>

