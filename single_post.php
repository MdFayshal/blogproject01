<?php include('admin/config.php'); ?>
<?php
	
		if($_GET['postid']){
			$id = $_GET['postid'];
			$query = "SELECT category.ctg_name,category.ctg_id,posts.* FROM posts INNER JOIN category ON category.ctg_id = posts.post_ctg   WHERE post_id = '$id'";
			$info = mysqli_query($conn, $query);
			$post = mysqli_fetch_assoc($info);

			if($_GET['postid']!==$post['post_id']){
				header('location:index.php');

			}
		}elseif($_GET['postid']==null){
			header('location:index.php');
		}
	


?>

<?php include('include/head.php'); ?>

<body>
	<div class="container">
		<!-- Menubar -->
		<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-8">
			<div class="card shadow bg-light">
				<div class="card-body">
					<div class="posts shadow bg-light">
						<h4 class="titlepost"><?php echo $post['post_title'];?></h4>
						<span><i>Author : <?php echo $post['post_author'];?></i> <i class=" float-right">Date: <?php echo $post['post_date'];?></i></span>
						<img class="my-3" src="images/<?php echo $post['post_img'];?>" style="width:100%;height:200px;" />
						<p>
							<?php echo $post['post_des'];?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<!-- Sidebar Recent posts -->
			<?php include('include/sidebar.php'); ?>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>