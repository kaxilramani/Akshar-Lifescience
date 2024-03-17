<?php
include('config.php');

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($con, post_string("name"));
    $cat = post_number("cat");
    $cmp = post_number("cmp");
    $pack = post_number("pack");
    $price = post_float("price");
    $img = $_FILES["img"];

    $qry = "INSERT INTO `medicines`(`m_name`, `m_cat`, `m_cmp`, `m_pack`, `m_price`) VALUES ('$name', '$cat', '$cmp', '$pack', '$price')";

    $res = mysqli_query($con, $qry);

    if ($res) {
        $id = mysqli_insert_id($con);
        if ($img) {
            if ($img["name"] != "" && $img["size"] != 0) {
                $fl = pathinfo($img["name"]);
                $ext = $fl["extension"];
                $img_name = $i = md5(date("Y-m-d h:i:s") . $title) . "." . $ext;
                move_uploaded_file($img["tmp_name"], "../public/images/medicines/" . $img_name);
                mysqli_query($con, "UPDATE `medicines` SET `m_img` = '$img_name' WHERE `m_id` = $id");
            }
        }
        header("location:medicines.php?s=1");
        exit();
    } else {
        header("location:medicines.php?s=0");
        exit();
    }
}

if (isset($_POST["update"])) {
    $id = get_number("edit");

    $name = mysqli_real_escape_string($con, post_string("name"));
    $cat = post_number("cat");
    $cmp = post_number("cmp");
    $pack = post_number("pack");
    $price = post_float("price");
    $img = $_FILES["img"];

    $qry = "UPDATE `medicines` SET `m_name` = '$name', `m_cat` = '$cat', `m_cmp` = '$cmp', `m_pack` = '$pack', `m_price` = '$price' WHERE `m_id` = '$id'";

    $res = mysqli_query($con, $qry);

    if ($res) {
        if ($img) {
            if ($img["name"] != "" && $img["size"] != 0) {
                $fl = pathinfo($img["name"]);
                $ext = $fl["extension"];
                $img_name = $i = md5(date("Y-m-d h:i:s") . $title) . "." . $ext;
                move_uploaded_file($img["tmp_name"], "../public/images/medicines/" . $img_name);
                mysqli_query($con, "UPDATE `medicines` SET `m_img` = '$img_name' WHERE `m_id` = $id");
            }
        }
        header("location:medicines.php?s=1");
        exit();
    } else {
        header("location:medicines.php?s=0");
        exit();
    }
}

if (isset($_GET["edit"])) {
    $id = get_number("edit");
    $res = mysqli_query($con, "SELECT * FROM `medicines` WHERE `m_id` = '$id'");
    if (mysqli_num_rows($res) == 1) {
        $edit = mysqli_fetch_assoc($res);
    } else {
        header("location:medicines.php?s=0");
        exit();
    }
}

include('header.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Medicines</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Medicines</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($edit)) {
                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-plus"></i>
                                Update Medicine
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 px-5">
                                        <div class="btn-container">
                                            <img id="img_display" src="../public/images/medicines/<?php print_not_empty($edit["m_img"]); ?>" class="img-fluid rounded-3 border border-secondary">
                                            <button class="btn btn-success btn-sm" id="img_upd" type="button">Select</button>
                                            <input type="file" name="img" id="img" class="d-none">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="name" class="form-label">Name :</label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $edit["m_name"]; ?>">
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="cat" class="form-label">Category :</label>
                                                <select class="form-select" id="cat" name="cat" required>
                                                    <?php
                                                    $cat_res = mysqli_query($con, "SELECT * FROM `categories` WHERE `cat_status` = 1");
                                                    while ($cat = mysqli_fetch_assoc($cat_res)) {
                                                    ?>
                                                        <option value="<?php echo $cat["cat_id"]; ?>" <?php print_selected($edit["m_cat"], $cat["cat_id"]); ?>><?php echo $cat["cat_name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="cmp" class="form-label">Company :</label>
                                                <select class="form-select" id="cmp" name="cmp" required>
                                                    <option value="">--Select--</option>
                                                    <?php
                                                    $cmp_res = mysqli_query($con, "SELECT * FROM `companies` WHERE `cmp_status` = 1");
                                                    while ($cmp = mysqli_fetch_assoc($cmp_res)) {
                                                    ?>
                                                        <option value="<?php echo $cmp["cmp_id"]; ?>" <?php print_selected($edit["m_cmp"], $cmp["cmp_id"]); ?>><?php echo $cmp["cmp_name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="pack" class="form-label">Pack of Units :</label>
                                                <input type="number" name="pack" id="pack" class="form-control" value="<?php echo $edit["m_pack"]; ?>">
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="price" class="form-label">Price Per Unit :</label>
                                                <input type="number" step="0.01" name="price" id="price" class="form-control" value="<?php echo $edit["m_price"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-9 offset-3">
                                        <button type="submit" name="update" class="btn btn-primary">Update Medicine</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-plus"></i>
                                Add Medicine
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 px-5">
                                        <div class="btn-container">
                                            <img id="img_display" src="../public/images/medicines/default.jpg" class="img-fluid rounded-3 border border-secondary">
                                            <button class="btn btn-success btn-sm" id="img_upd" type="button">Select</button>
                                            <input type="file" name="img" id="img" class="d-none">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="name" class="form-label">Title :</label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="cat" class="form-label">Category :</label>
                                                <select class="form-select" id="cat" name="cat" required>
                                                    <?php
                                                    $cat_res = mysqli_query($con, "SELECT * FROM `categories` WHERE `cat_status` = 1");
                                                    while ($cat = mysqli_fetch_assoc($cat_res)) {
                                                    ?>
                                                        <option value="<?php echo $cat["cat_id"]; ?>"><?php echo $cat["cat_name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="cmp" class="form-label">Company :</label>
                                                <select class="form-select" id="cmp" name="cmp" required>
                                                    <option value="">--Select--</option>
                                                    <?php
                                                    $cmp_res = mysqli_query($con, "SELECT * FROM `companies` WHERE `cmp_status` = 1");
                                                    while ($cmp = mysqli_fetch_assoc($cmp_res)) {
                                                    ?>
                                                        <option value="<?php echo $cmp["cmp_id"]; ?>"><?php echo $cmp["cmp_name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="pack" class="form-label">Pack of Units :</label>
                                                <input type="number" name="pack" id="pack" class="form-control">
                                            </div>
                                            <div class="col-6 mt-2">
                                                <label for="price" class="form-label">Price Per Unit :</label>
                                                <input type="number" step="0.01" name="price" id="price" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-9 offset-3">
                                        <button type="submit" name="create" class="btn btn-primary">Add Medicine</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-list"></i>
                            All Medicines
                        </div>
                        <div class="card-body">
                            <table id="users" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Company</th>
                                        <th>Pack of Units</th>
                                        <th>Price Per Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $med_res = mysqli_query($con, "SELECT * FROM `medicines`, `categories`, `companies` WHERE `m_cat` = `cat_id` AND `m_cmp` = `cmp_id`");
                                    while ($med = mysqli_fetch_assoc($med_res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $med["m_id"]; ?></td>
                                            <td><img src="../public/images/medicines/<?php print_not_empty($med["m_img"]); ?>" class="rounded-4" width="110px"></td>
                                            <td><?php echo $med["m_name"]; ?></td>
                                            <td><?php echo $med["cat_name"]; ?></td>
                                            <td><?php echo $med["cmp_name"]; ?></td>
                                            <td><?php echo $med["m_pack"]; ?></td>
                                            <td><?php echo $med["m_price"]; ?></td>
                                            <td>
                                                <a href="medicines.php?edit=<?php echo $med["m_id"]; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                function script()
                {
                ?>
                    <script>
                        $(document).ready(function() {
                            var src = document.getElementById("img");
                            var target = document.getElementById("img_display");
                            showImage(src, target);
                            $("#img_upd").click(function() {
                                $("#img").click();
                            });

                        });
                        <?php
                        if (!isset($edit)) {
                        ?>
                            $("#users").DataTable();
                        <?php
                        }
                        ?>
                    </script>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</main>
<?php include('footer.php') ?>