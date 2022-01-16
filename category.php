<?php include('admin/config.php'); ?>
<?php include('include/head.php'); ?>

<body>
	<div class="container">
		<!-- Menubar -->
		<?php include('include/header.php'); ?>



		<div class="row">
			<div class="col-md-8">
				<!-- Main Posts -->
				<?php include('include/ctgpost.php'); ?>

			</div>
			<div class="col-md-4">
				<!-- Sidebar Recent posts -->
				<?php include('include/sidebar.php'); ?>

			</div>
		</div>
	</div>
	<!-- Script Section -->
	<?php include('include/script.php'); ?>
</body>

</html>