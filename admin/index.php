<?php include('config.php'); ?>
<?php include('includes/head.php'); ?>

<body>
	<div class="container m-5 p-5 ">
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4 ">
				<div class="card">
					<div class="card-body shadow bg-light">
						<form action="" method="POST">
							<div class="form-group">
								<label>E-mail</label>
								<input type="email" class="form-control" name="admin_email" />
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="admin_pass" />
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" name="admin_login" value="Log In" />
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col--4"></div>
		</div>
	</div>
	<?php include('includes/script.php'); ?>
</body>

</html>

<?php
if (isset($_POST['admin_login'])) {
	$admin_email = $_POST['admin_email'];
	$admin_pass = md5($_POST['admin_pass']);

	$query = "SELECT * FROM admin_info WHERE admin_email = '$admin_email' && admin_pass ='$admin_pass'";

	if (mysqli_query($conn, $query)) {
		$info = mysqli_query($conn, $query);
		$check = mysqli_num_rows($info);

		if ($check == 0) {
?>
<script type="text/javascript"> alert('E-mail or Password Wrong !'); </script>
<?php
		}else{
			$data = mysqli_fetch_assoc($info);
			$email = $data['admin_email'];
			$pass = $data['admin_pass'];
			$name = $data['admin_name'];

			session_start();
			$_SESSION['email'] = $email  ;
			$_SESSION['pass'] = $pass  ;
			$_SESSION['name'] =$name;

			header('location:dashboard.php');

		}
	}
}
?>