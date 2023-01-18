<?php
require_once("config.php");
$limit = 10;
$page=1;

$sql1 = "SELECT * FROM users";

if(isset($_REQUEST["page"]) && $_REQUEST["page"]!="" ){
  $page=$_REQUEST["page"];

}

if(isset($_REQUEST["search"]) && $_REQUEST["search"]!="" ){
  $search=$_REQUEST["search"];
  $sql1 = $sql1. " WHERE username LIKE '%{$search}%' OR email LIKE '%{$search}%'";
}

$offset=($page -1 )* $limit;
$res1 = mysqli_query($conn,$sql1) or die($sql1);

/****** get total records ***/
 $total_record= mysqli_num_rows($res1);
 $total_page = ceil($total_record/$limit);


$sql = $sql1." LIMIT {$offset},{$limit}";
$res=mysqli_query($conn,$sql);
?>

<?php
if($res && mysqli_num_rows($res)>0){
  while ($row= mysqli_fetch_assoc($res)){?>
  <tr id="userRecords">
    <td><?= $row["id"] ?></td>
    <td><?= $row["username"] ?></td>
    <td><?= $row["email"] ?></td>
    <td><img src="<?= "upload/". $row['profile_picture'] ?>" alt="profile picture" width="70px" height="70px"></td>
    <td>
      <a href="view_user.php?id=<?= $row["id"] ?>" class="btn btn-warning">View</a>
      <a href="add_edit_user.php?id=<?= $row["id"] ?>" class="btn btn-primary">Edit</a>
      <a data-id="<?= $row["id"] ?>" href="javascript::void(0)" class="btn btn-danger deleteRecord">Delete</a>
    </td>
  </tr>
<?php
}
}else{
  echo "<tr><td colspan='4' class='text-center'><h3>No Record Found</h3></td></tr>";
}
?>
<?php if($total_page>1){ ?>
<tr id="userpagination">
  <td colspan="5">
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php if($page>1){?>
    <li class="page-item pagination-page" data-page="<?= $page ?>" data-type="prv">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php } ?>
    <?php for($i=1; $i<= $total_page; $i++){ ?>
    <li data-page="<?= $i ?>" class="pagination-page page-item <?= $page == $i ? 'active': '' ?> "><a class="page-link" href="#"><?= $i ?></a></li>
    <?php }?>
    <?php if($total_page>$page){ ?>
    <li class="page-item pagination-page" data-page="<?= $page ?>" data-type="next">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
    <?php }?>
  </ul>
</nav>
  </td>
</tr>  
<?php } ?>