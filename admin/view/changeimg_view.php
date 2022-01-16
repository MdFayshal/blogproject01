<?php

	 $id = $_GET['id'];
     $select = "SELECT category.ctg_name,category.ctg_id,posts.* FROM posts INNER JOIN category ON category.ctg_id = posts.post_ctg WHERE post_id = '$id'";
     $info = mysqli_query($conn, $select);
     $data = mysqli_fetch_assoc($info);
     
    if(isset($_POST['change_img'])){
        $oldimg = $_POST['old_img'];
        $img = $_FILES['change_img']['name'];
        $tmp_name = $_FILES['change_img']['tmp_name'];

        $query ="UPDATE posts SET post_img = '$img'  WHERE post_id = $id";
        
        $update = mysqli_query($conn,$query);

        if($update){

            unlink('../images/'.$oldimg);
            move_uploaded_file($tmp_name,'../images/'.$img);

            echo '<script type="text/javascript">swal("Successful!", "New Post Added!", "success").then((value) => {window.open("all_post.php","_self");});</script>';
            
        }else{
            echo '<script type="text/javascript">swal("Failed!", "Data Insert Failed", "error");</script>';

        }

        
    }


?>




<h2 class="text-center" for="change_img">Change Thumbnail</h2>

<div class=" border m-5 p-5 shadow">
    <img id="change_img" src="../images/<?php echo $data['post_img'];?>" height="150px" width="220px" alt="">
    <form action="" class="form float-right " method="POST" enctype="multipart/form-data">
        <input type="hidden" name="img_id" value="<?php echo $id;?>">
        <input type="hidden" type="file" name="old_img" value="<?php echo $data['post_img'];?>">
        
        <div class="form-group">
            
            <input class="py-4" name="change_img" id="change_img" type="file" onchange="changeimg(this)" accept="image/*" required />
        </div>
        <a class="btn btn-secondary" href="all_post.php">Back</a>
        <input class="btn text-light btn-warning" type="submit"  name ="change_img" value="Change Thumbnail">
        
    </form>
    
</div>
<!-- THis is a script to show onload Image -->
<script type="text/javascript">
    function changeimg(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#change_img')
                  .attr('src', e.target.result)
				  .attr("class","img-thumbnail mb-2")
              };
              reader.readAsDataURL(input.files[0]);
          }
        }
</script>