<div class="row mt-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add New Category</div>
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" class="form-control" value="1"  name="ctg_status"/>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control"  name="ctg_name"/>
                    </div>
                    <div class="form-group">
                        <label>Category Description</label>
                        <input type="text" class="form-control"  name="ctg_des"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="add_ctg" value="Add Category" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['add_ctg'])){
        $name = $_POST['ctg_name'];
        $des = $_POST['ctg_des'];
        $status = $_POST['ctg_status'];

        $query = "INSERT INTO category (ctg_name, ctg_des, ctg_status) VALUES ('$name', '$des', $status)";
        if (mysqli_query($conn, $query)) {

            echo '<script type="text/javascript">swal("Successful!", "New Category Added!", "success").then((value) => {window.open("add_category.php","_self");});</script>';
        } else {
            echo '<script type="text/javascript">swal("Failed!", "Insert Data Failed", "error");</script>';
        }

    }

?>