<?php
	$query = "SELECT * FROM category WHERE ctg_status =1";
	$data = mysqli_query($conn,$query);

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
			<a class="navbar-brand" href="#">My Blog</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="" class="nav-link">Home</a></li>
    			<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Category
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php while($ctg = mysqli_fetch_assoc($data)){?>
						<a class="dropdown-item" href="category.php?ctgid=<?php echo $ctg['ctg_id'];?>"><i class="fa fa-user"></i> <?php echo $ctg['ctg_name'];?></a>
						<?php }?>
					</div>
				</li>
				<li class="nav-item"><a href="" class="nav-link">About</a></li>
				<li class="nav-item"><a href="" class="nav-link">Contact</a></li>
			</ul>
		</div>
	</nav>
	<!--End Menubar-->
	<div class="container">
		<div class="row bg-warning">
		<div class="col-md-12">
			<h6 class="float-left ml-5">Date: <?php echo date('d/m/Y');?></h6>
			<h6 class="float-right mr-5">Time: <?php echo date('m:h:s');?></h6>
		</div>
	</div>
	</div>