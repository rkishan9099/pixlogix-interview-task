<?php require_once('header.php');
?>
<div class="container-fluid mt-4">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h1>User Lists</h1>
      <a href="add_edit_user.php" class="btn btn-primary text-light">Add User</a>
    </div>
    <div class="body">
      <div class="form-group p-4">
        <input type="search" class="form-control" id="search" placeholder="search Username and Email Here.......">
      </div>
      <div class="table-responsive-md">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="userData">
            </tbody>
            </table>
          </div>
          
          <div class="demo"></div>
        </div>
      </div>
    </div>
    <?php require_once('footer.php') ?>