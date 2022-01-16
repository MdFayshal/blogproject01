<?php
$query = 'SELECT category.ctg_name,category.ctg_id,posts.* FROM posts INNER JOIN category ON category.ctg_id = posts.post_ctg';
$info = mysqli_query($conn, $query);

?>
<?php
if (isset($_POST['update_post'])) {
    $id = $_POST['post_id'];
    $title = $_POST['update_title'];
    $ctg = $_POST['update_ctg'];
    $des = $_POST['update_des'];

    $query = "UPDATE `posts` SET `post_title`='$title',`post_des`='$des',`post_ctg`='$ctg' WHERE post_id =$id;";
    if (mysqli_query($conn, $query)) {

        echo '<script type="text/javascript">swal("Updated!", "Successfully Update Post!", "success").then((value) => {window.open("all_post.php","_self");});</script>';
    } else {
        echo '<script type="text/javascript">swal("Failed!", "Update Data Failed", "error").then((value) => {window.open("all_post.php","_self");});</script>';
    }
}


?>
<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "delete") {
        $id = $_GET['id'];
        $get_img = "SELECT * FROM posts WHERE  post_id = $id";
        $img_info = mysqli_query($conn, $get_img);
        $select_img = mysqli_fetch_assoc($img_info);
        $img = $select_img['post_img'];
        $qry = "DELETE FROM `posts` WHERE `posts`.`post_id` = $id";
        $delete = mysqli_query($conn, $qry);

        if ($delete == true) {
            unlink('../images/' . $img);
            echo '<script type="text/javascript">swal("Deleted!", "Post Deleted Successfully!", "success").then((value) => {window.open("all_post.php","_self");});</script>';
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
    
            $query = "UPDATE posts SET post_status=1 WHERE post_id= $id";
            $deactive = mysqli_query($conn, $query);
            if ($deactive == true) {
                echo '<script type="text/javascript">swal("Active!", "Category Active Successfully!", "success").then((value) => {window.open("all_post.php","_self");});</script>';
            }
        }
    }
    if (isset($_GET['status'])) {
        if ($_GET['status'] == "deactive") {
            $id = $_GET['id'];
    
            $query = "UPDATE posts SET post_status=0 WHERE post_id= $id";
            $deactive = mysqli_query($conn, $query);
            if ($deactive == true) {
                echo '<script type="text/javascript">swal("Deactive!", "Category Deactive Successfully!", "success").then((value) => {window.open("all_post.php","_self");});</script>';
            }
        }
    }
?>
<table class="table table-responsive table-bordered mt-2">
    <tr>
        <th>SL</th>
        <th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
        <th>Description</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php
    $sl = 1;
    while ($show = mysqli_fetch_assoc($info)) {

    ?>
        <tr>
            <td><?php echo $sl++; ?></td>
            <td><?php echo $show['post_title']; ?></td>
            <td><?php echo $show['ctg_name']; ?></td>
            <td><?php echo $show['post_author']; ?></td>
            <td><?php echo $show['post_date']; ?></td>
            <td><?php echo $show['post_des']; ?></td>

            <td><img class="fw-6" height="75px" width="125px" src="../images/<?php echo $show['post_img']; ?>" alt="Thumbnil"><br>
                <a class="badge badge-info text-light" href="changethumbnail.php?view=change&&id=<?php echo $show['post_id']; ?>">Change Thumbnail</a>
            </td>
            <td>
                <?php


                if ($show['post_status'] == 1) {
                ?>
                    <a class="badge badge-success text-light">Published</a>
                    <a class="badge badge-secondary " href="?status=deactive&&id=<?php echo $show['post_id']; ?>">Save Draft</a>
                <?php
                } else {
                ?>
                    <a class="badge badge-secondary text-light" href="?status=active&&id=<?php echo $show['post_id']; ?>">Publish</a>
                    <a class="badge badge-warning text-light">Saved Draft</a>

                <?php
                }
                ?>

            </td>
            <td>
                <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#postview<?php echo $show['post_id']; ?>">View</a>
                <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#postedit<?php echo $show['post_id']; ?>">Edit</a>
                <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#postdelet<?php echo $show['post_id']; ?>">Delete</a>
            </td>
        </tr>

        <!-- View Post Modal -->
        <div class="modal fade" id="postview<?php echo $show['post_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary text-light">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $show['post_title']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-dark text-info fs-3">
                        <img height="200px" width="475px" src="../images/<?php echo $show['post_img']; ?>" alt="Thumbnail">
                        <p><span class=" text-capitalize "><?php echo $show['post_author']; ?></span> Date:<span><?php echo $show['post_date']; ?></span></p>
                        <p><?php echo $show['post_des']; ?></p>
                        <p>Post Status : <span class=" text-capitalize "><?php if ($show['post_status'] == 1) {
                                                                                echo 'Published';
                                                                            } else {
                                                                                echo 'Unpublished';
                                                                            } ?></span></p>




                    </div>
                    <div class="modal-footer bg-secondary">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!--Edit POSt  Modal-->
        <div class="modal fade" id="postedit<?php echo $show['post_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" action="" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $show['post_id']; ?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="update_title" type="text" class="form-control" value="<?php echo $show['post_title']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="update_ctg">

                                    <?php
                                    $query = "SELECT * FROM category WHERE ctg_status =1";
                                    $category = mysqli_query($conn, $query);
                                    while ($ctg = mysqli_fetch_assoc($category)) { ?>

                                        <option <?php if ($ctg['ctg_id'] == $show['ctg_id']) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $ctg['ctg_id']; ?>"><?php echo $ctg['ctg_name']; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label><br />
                                <textarea class="form-control" name="update_des" rows="5"><?php echo $show['post_des']; ?> </textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning form-control text-light" name="update_post" value="UpdatePost" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal for delete Alert-->
        <div class="modal fade" id="postdelet<?php echo $show['post_id']; ?>" tabindex="-1" role="dialog">
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
                        <a type="button" class="btn btn-primary text-light" href="?status=delete&&id=<?php echo $show['post_id']; ?>">Yes, delete it!</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</table>