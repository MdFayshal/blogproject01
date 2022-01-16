<?php
session_start();
if (!isset($_SESSION['email'])) {
	header('location:index.php');
}
?>
<?php include('config.php'); ?>
<?php include('Includes/head.php'); ?>

<body>

	<?php include('Includes/header.php'); ?>
	<div class="row">
		<div class="col-md-4 bg-dark pt-3 " style="height:550px;">
			<?php include('Includes/sidebar.php'); ?>
		</div>
		<div class="col-md-8 pt-3">
			<?php if (isset($view)) {
				if ($view == 'dashboard') {
					include('view/dashboard_view.php');
				} elseif ($view == 'add_admin') {
					include('view/add_admin_view.php');
				} elseif ($view == 'all_admin') {
					include('view/all_admin_view.php');
				} elseif ($view == 'add_post') {
					include('view/add_post_view.php');
				} elseif ($view == 'all_post') {
					include('view/all_post_view.php');
				} elseif ($view == 'add_ctg') {
					include('view/add_ctg_view.php');
				} elseif ($view == 'all_ctg') {
					include('view/all_ctg_view.php');
				}elseif ($view == 'test') {
					include('view/test_view.php');
				}elseif ($view == 'change') {
					include('view/changeimg_view.php');
				}
			}
			?>
		</div>
	</div>
	<?php include('Includes/script.php'); ?>
</body>

</html>