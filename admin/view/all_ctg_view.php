<?php
$query = "SELECT * FROM category";
$data = mysqli_query($conn, $query);

?>
<?php
if (isset($_POST['update_ctg'])) {
    $id = $_POST['ctg_id'];
    $name = $_POST['update_name'];
    $des = $_POST['update_des'];

    $query = "UPDATE category SET ctg_name = '$name', ctg_des ='$des' WHERE ctg_id = $id ";
    $update = mysqli_query($conn, $query);

    if ($update == true) {
        echo '<script type="text/javascript">swal("Updated!", "Category Update Successfully!", "success").then((value) => {window.open("all_category.php","_self");});</script>';
    } else {
        echo '<script type="text/javascript">swal("Failed!", "Category Update Failed!", "warning");</script>';
    }
}
?>
<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "delete") {
        $id = $_GET['id'];

        $query = "DELETE FROM category WHERE ctg_id= $id";
        $delete = mysqli_query($conn, $query);

        if ($delete == true) {
            echo '<script type="text/javascript">swal("Deleted!", "Category Deleted Successfully!", "success").then((value) => {window.open("all_category.php","_self");});</script>';
        } else {
            echo '<script type="text/javascript">swal("Failed!", "Data Delete Failed!", "warning");</script>';
        }
    }
}

?>
<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "active") {
        $id = $_GET['id'];

        $query = "UPDATE category SET ctg_status=1 WHERE ctg_id= $id";
        $deactive = mysqli_query($conn, $query);
        if ($deactive == true) {
            echo '<script type="text/javascript">swal("Active!", "Category Active Successfully!", "success").then((value) => {window.open("all_category.php","_self");});</script>';
        }
    }
}
if (isset($_GET['status'])) {
    if ($_GET['status'] == "deactive") {
        $id = $_GET['id'];

        $query = "UPDATE category SET ctg_status=0 WHERE ctg_id= $id";
        $deactive = mysqli_query($conn, $query);
        if ($deactive == true) {
            echo '<script type="text/javascript">swal("Deactive!", "Category Deactive Successfully!", "success").then((value) => {window.open("all_category.php","_self");});</script>';
        }
    }
}


?>
<h2 class="text-center py-2"> All Category</h2>
<table class="table table-responsive mt-2">
    <tr class="text-center">
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
    $sl = 1;
    while ($show = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?php echo $sl++; ?></td>
            <td><?php echo $show['ctg_name']; ?></td>
            <td><?php echo $show['ctg_des']; ?></td>
            <td class="text-light"><?php


                                    if ($show['ctg_status'] == 1) {
                                    ?>
                    <a class="badge badge-success">Active</a>
                    <a class="badge badge-secondary " href="?status=deactive&&id=<?php echo $show['ctg_id']; ?>">Deactive</a>
                <?php
                                    } else {
                ?>
                    <a class="badge badge-secondary text-light" href="?status=active&&id=<?php echo $show['ctg_id']; ?>">Active</a>
                    <a class="badge badge-warning">Deactive</a>

                <?php
                                    }
                ?>
            </td>
            <td>

                <a class="btn btn-sm btn-info" type="submit" data-toggle="modal" data-target="#edit_ctg<?php echo $show['ctg_id']; ?>" href="">Edit</a>
                <a class="btn btn-sm btn-danger" type="submit" data-toggle="modal" data-target="#delete_ctg<?php echo $show['ctg_id']; ?>" href="">Delete</a>
            </td>
            <!--Modal for delete Alert-->
            <div class="modal fade" id="delete_ctg<?php echo $show['ctg_id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  text-center">Are you sure?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Once deleted, you will not be able to recover this imaginary file!</p>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-primary text-light" href="?status=delete&&id=<?php echo $show['ctg_id']; ?>">Yes, delete it!</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </tr>


        <!-- Modal for Edit Data-->
        <div class="modal fade" id="edit_ctg<?php echo $show['ctg_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary text-light">
                        <h5 class="modal-title" id="exampleModalLongTitle">Category Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" action="" method="POST">
                            <input type="hidden" name="ctg_id" value="<?php echo $show['ctg_id']; ?>">
                            <label for="ctg_name">Update Name</label>
                            <input class="form-control" type="text" name="update_name" value="<?php echo $show['ctg_name']; ?>">
                            <label for="admin_name">Update Description</label>
                            <input class="form-control" type="text" name="update_des" value="<?php echo $show['ctg_des']; ?>">
                            <input class="form-control btn btn-warning mt-3" type="submit" name="update_ctg" value="Update Information">
                        </form>

                    </div>
                    <div class="modal-footer bg-secondary">
                        <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</table>