<?php
include('config.php');

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($con, post_string("name"));
    $qry = "INSERT INTO `companies`( `cmp_name`) VALUES ('$name')";
    $res = mysqli_query($con, $qry);
    if ($res) {
        header("location:companies.php?s=1");
        exit();
    } else {
        header("location:companies.php?s=0");
        exit();
    }
}
if (isset($_POST["update"])) {
    $id = get_number("edit");
    $name = mysqli_real_escape_string($con, post_string("name"));
    $qry = "UPDATE `companies` SET `cmp_name` = '$name' WHERE `cmp_id` = '$id'";
    $res = mysqli_query($con, $qry);
    if ($res) {
        header("location:companies.php?s=1");
        exit();
    } else {
        header("location:companies.php?edit=$id&s=0");
        exit();
    }
}

if (isset($_GET["edit"])) {
    $id = get_number("edit");
    $res = mysqli_query($con, "SELECT * FROM `companies` WHERE `cmp_id` = '$id'");
    if (mysqli_num_rows($res) == 1) {
        $edit = mysqli_fetch_assoc($res);
    } else {
        header("location:companies.php?s=0");
        exit();
    }
}

include('header.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Companies</h1>
        <ol class="breadcrumb mb-4">
            <?php
            if (isset($edit)) {
            ?>
                <li class="breadcrumb-item"><a href="companies.php">Companies</a></li>
                <li class="breadcrumb-item active">Edit</li>
            <?php
            } else {
            ?>
                <li class="breadcrumb-item active">Companies</li>
            <?php
            }
            ?>
        </ol>
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($edit)) {
                ?>
                    <form action="" method="post">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-square"></i>
                                Update Company
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="name">Name :</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $edit["cmp_name"]; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="update" class="btn btn-primary">Update Company</button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <form action="companies.php" method="post">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-square"></i>
                                Add Company
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="name">Name :</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="create" class="btn btn-primary">Add Company</button>
                            </div>
                        </div>
                    </form>
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-list"></i>
                            All Company
                        </div>
                        <div class="card-body">
                            <table id="companies" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM `companies`");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["cmp_id"]; ?></td>
                                            <td><?php echo $row["cmp_name"]; ?></td>
                                            <td>
                                                <a href="companies.php?edit=<?php echo $row["cmp_id"]; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            function script()
                            {
                            ?>
                                <script>
                                    $("#companies").DataTable();
                                </script>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</main>
<?php include('footer.php') ?>