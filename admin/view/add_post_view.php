<?php
    if(isset($_POST['add_post'])){
        $post_title = $_POST['post_title'];
        $post_ctg   = $_POST['post_ctg'];
        $post_img = $_FILES['post_img']['name'];
        $tmp_name = $_FILES['post_img']['tmp_name'];
        $post_des   = $_POST['post_des'];
        $post_author =$_SESSION['name'];
        $post_date =date('d-m-y');

        $query="INSERT INTO posts (post_title, post_img, post_des, post_ctg, post_author, post_date) VALUES ('$post_title', '$post_img', '$post_des', $post_ctg, '$post_author', '$post_date')";
        $post = mysqli_query($conn,$query);
        if($post){
            move_uploaded_file($tmp_name,'../images/'.$post_img);

            echo '<script type="text/javascript">swal("Successful!", "New Post Added!", "success").then((value) => {window.open("add_post.php","_self");});</script>';
            
        }else{
            echo '<script type="text/javascript">swal("Failed!", "Data Insert Failed", "error");</script>';

        }
    }
    

?>

<div class="row mt-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add New POST</div>
            <div class="card-body">
                <form class="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input name="post_title" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="post_ctg">
                        <option selected></option>
                            <?php
                            $query= "SELECT * FROM category WHERE ctg_status =1";
                            $category = mysqli_query($conn, $query); 
                            while($ctg = mysqli_fetch_assoc($category)){ ?>

                            <option value="<?php echo $ctg['ctg_id'];?>"><?php echo $ctg['ctg_name'];?></option>
                            
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="post_img" class="form-control-file" />
                    </div>
                    <div class="form-group">
                        <label>Description</label><br />
                        <textarea class="form-control" name="post_des"  rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="add_post" value="Add Post" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
