<div class="bg-warning py-2">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand font-weight-bold text-light" href="dashboard.php">SMFDEv.</a>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="font-weight-bold  pr-3 text-capitalize text-light " style="text-decoration: none;" href="dashboard.php"><?php echo $_SESSION['name']; ?></a>
            </li>
            <li class="nav-item">
                <a class=" text-light" style="text-decoration: none; " href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </li>
    </nav>
</div>