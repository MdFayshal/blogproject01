<?php
    $query = "SELECT * FROM admin_info";
    $data = mysqli_query($conn, $query);
?>
<?php
  if(isset($_GET['status'])){
    if($_GET['status']=='delete'){
      $id = $_GET['id'];
      $query = "DELETE FROM admin_info WHERE admin_id =$id";
      $delete = mysqli_query($conn, $query);

      if($delete==true){
        echo '<script type="text/javascript">swal("Deleted!", "Data Deleted Successfully!", "success").then((value) => {window.open("all_admin.php","_self");});</script>';
      }else{
        echo'<script type="text/javascript">swal("Failed!", "Data Delete Failed!", "warning");</script>';
      }
    }
  }

?>
<?php 
  if(isset($_POST['update_admin'])){
    $id = $_POST['admin_id'];
    $name = $_POST['update_name'];
    $email = $_POST['update_email'];
    $number = $_POST['update_number'];
    $pass = md5($_POST['update_pass']);
    $query = "UPDATE admin_info SET admin_name = '$name', admin_email = '$email', admin_pass = '$pass', admin_number = $number WHERE admin_id = $id";
    $update= mysqli_query($conn,$query);
    if($update==true){
      echo '<script type="text/javascript">swal("Updated!", "Data Update Successfully!", "success").then((value) => {window.open("all_admin.php","_self");});</script>';
    }else{
      echo'<script type="text/javascript">swal("Failed!", "Data Update Failed!", "warning");</script>';
    }
  }

?>


<h2 class="text-center py-2">Admin List</h2>
<table class="table table-bordered mt-2">
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Password</th>
        <th>Action</th>
    </tr>
    <?php
    $sl=1;
     While( $show = mysqli_fetch_assoc($data)){?>
    <tr>
   
        <td><?php echo $sl++;?></td>
        <td><?php echo $show['admin_name'];?></td>
        <td><?php echo $show['admin_email'];?></td>
        <td><?php echo $show['admin_number'];?></td>
        <td><?php echo $show['admin_pass'];?></td>
       
        <td>
            <a class="btn btn-sm btn-info" type="submit" data-toggle="modal" data-target="#view<?php echo $show['admin_id'];?>" href=""  >View</a>
            <a href="" type="submit" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit<?php echo $show['admin_id'];?>">Edit</a>
            <a href="?status=delete&&id=<?php echo $show['admin_id'];?>" type="submit" class="btn btn-sm btn-danger">Delete</a>
        </td>
        
    </tr>
    <!-- Modal  Show Data-->
<div class="modal fade" id="view<?php echo $show['admin_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-light">
        <h5 class="modal-title" id="exampleModalLongTitle">Admin Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark text-info fs-3">
        <p>Name     : <span><?php echo $show['admin_name'];?></span></p>
        <p>E-mail   : <span><?php echo $show['admin_email'];?></span></p>
        <p>Number   : <span><?php echo $show['admin_number'];?></span></p>
        <p>Password : <span><?php echo $show['admin_pass'];?></span></p>
        
      </div>
      <div class="modal-footer bg-secondary">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for Edit Data-->
<div class="modal fade" id="edit<?php echo $show['admin_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-light">
        <h5 class="modal-title" id="exampleModalLongTitle">Admin Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" action="" method="POST">
          <input type="hidden" name="admin_id" value="<?php echo $show['admin_id'];?>">
          <label for="admin_name">Update Name</label>
          <input class="form-control" type="text" name="update_name" value="<?php echo $show['admin_name'];?>">
          <label for="admin_name">Update E-mail</label>
          <input class="form-control" type="email" name="update_email" value="<?php echo $show['admin_email'];?>">
          <label for="admin_name">Update Number</label>
          <input class="form-control" type="text" name="update_number" value="<?php echo $show['admin_number'];?>">
          <label for="admin_name">Update  Password</label>
          <input class="form-control" type="text" name="update_pass" value="<?php echo $show['admin_pass'];?>">
          <input class="form-control btn btn-warning mt-3" type="submit" name="update_admin" value="Update Information">
        </form>
        
      </div>
      <div class="modal-footer bg-secondary">
        <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php }?>
</table>
