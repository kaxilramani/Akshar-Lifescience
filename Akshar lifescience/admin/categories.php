<?php
include('config.php');

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($con, post_string("name"));
    $qry = "INSERT INTO `categories`( `cat_name`) VALUES ('$name')";
    $res = mysqli_query($con, $qry);
    if ($res) {
        header("location:categories.php?s=1");
        exit();
    } else {
        header("location:categories.php?s=0");
        exit();
    }
}

if (isset($_POST["update"])) {
    $id = get_number("edit");
    $name = mysqli_real_escape_string($con, post_string("name"));
    $qry = "UPDATE `categories` SET `cat_name` = '$name' WHERE `cat_id` = '$id'";
    $res = mysqli_query($con, $qry);
    if ($res) {
        header("location:categories.php?s=1");
        exit();
    } else {
        header("location:categories.php?edit=$id&s=0");
        exit();
    }
}

if (isset($_GET["edit"])) {
    $id = get_number("edit");
    $res = mysqli_query($con, "SELECT * FROM `categories` WHERE `cat_id` = '$id'");
    if (mysqli_num_rows($res) == 1) {
        $edit = mysqli_fetch_assoc($res);
    } else {
        header("location:categories.php?s=0");
        exit();
    }
}

include('header.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Categories</h1>
        <ol class="breadcrumb mb-4">
            <?php
            if (isset($edit)) {
            ?>
                <li class="breadcrumb-item"><a href="categories.php">Categories</a></li>
                <li class="breadcrumb-item active">Edit</li>
            <?php
            } else {
            ?>
                <li class="breadcrumb-item active">Categories</li>
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
                                Update Category
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="name">Name :</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $edit["cat_name"]; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="update" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <form action="categories.php" method="post">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-square"></i>
                                Add Category
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
                                <button type="submit" name="create" class="btn btn-primary">Add Category</button>
                            </div>
                        </div>
                    </form>
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-list"></i>
                            All Categories
                        </div>
                        <div class="card-body">
                            <table id="categories" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM `categories`");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["cat_id"]; ?></td>
                                            <td><?php echo $row["cat_name"]; ?></td>
                                            <td>
                                                <a href="categories.php?edit=<?php echo $row["cat_id"]; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
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
                                    $("#categories").DataTable();
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