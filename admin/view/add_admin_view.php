<?php


if (isset($_POST['add_admin'])) {
    $name = $_POST['admin_name'];
    $email = $_POST['admin_email'];
    $number = $_POST['admin_number'];
    $pass = md5($_POST['admin_pass']);


    $query = "INSERT INTO admin_info (admin_name, admin_email, admin_pass, admin_number) VALUES ('$name', '$email','$pass', '$number')";
    if (mysqli_query($conn, $query)) {

        echo '<script type="text/javascript">swal("Successful!", "New Admin Added!", "success").then((value) => {window.open("add_admin.php","_self");});</script>';
    } else {
        echo '<script type="text/javascript">swal("Failed!", "Insert Data Failed", "error");</script>';
    }
}

?>

<div class="row mt-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add New Admin</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="admin_name" required />
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control " name="admin_email" required />
                    </div>
                    <div class="form-group">
                        <label>Number</label>
                        <input type="text" class="form-control " name="admin_number" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="admin_pass" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="add_admin" value="Add Admin" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>