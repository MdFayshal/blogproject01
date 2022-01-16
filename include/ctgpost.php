<?php
    
    if($_GET['ctgid']){
        $id =$_GET['ctgid'];
        $query = "SELECT category.ctg_name,category.ctg_id,posts.* FROM posts INNER JOIN category ON category.ctg_id = posts.post_ctg   WHERE ctg_id= '$id' ORDER BY `posts`.`post_date` DESC";
        $info = mysqli_query($conn, $query);

        $data = mysqli_fetch_assoc($info);
        if($_GET['ctgid']!== $data['ctg_id']){
            header('location:index.php');
        }
        
        
    }else{
        header('location:index.php');
    }


?>
<div class="card shadow bg-light">
	<div class="card-body">
		<div class="row"><strong>
				<h5>Leatest Posts</h5>
			</strong></div>
		<?php while ($show = mysqli_fetch_assoc($info)) { 
            
            
            ?>
            
			<div class="posts shadow bg-light">
				<h4 class="titlepost"><?php echo $show['post_title']; ?></h4>
				<p class=" font-weight-light font-italic">
					<span>Author: <?php echo $show['post_author']; echo $show['ctg_id'];?> </span>
					<span class=" float-right">Date: <?php echo $show['post_date'];?></span>
				</p>
				<hr>
				<img src="images/<?php echo $show['post_img']; ?>" />
				<p>
					<?php echo substr($show['post_des'],0,250) ?> . . .
				</p>
				<a href="single_post.php?postid=<?php echo $show['post_id'];?>" class="btn btn-success float-right">Read More</a>
				<br /><br />
			</div>
		<?php } ?>
	</div>
</div>
