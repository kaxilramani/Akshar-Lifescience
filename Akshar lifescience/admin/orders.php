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
$date = date("Y-m-d");
if (isset($_GET["date"])) {
    $date = $_GET["date"];
}
$status = "";
if (isset($_GET["status"])) {
    $status = $_GET["status"];
}
include('header.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Orders</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Orders</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-list"></i>
                        All Orders
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row pb-4">
                                <div class="col-4 mt-2">
                                    <label for="date" class="form-label">Order Date :</label>
                                    <input type="date" name="date" id="date" value="<?php echo $date; ?>" class="form-control">
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="status" class="form-label">Order Status :</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="" <?php print_selected($status, ""); ?>>All (Expect Deleted)</option>
                                        <option value="1" <?php print_selected($status, "1"); ?>>Placed</option>
                                        <option value="2" <?php print_selected($status, "2"); ?>>Out For Delivery</option>
                                        <option value="3" <?php print_selected($status, "3"); ?>>Delivered</option>
                                        <option value="4" <?php print_selected($status, "4"); ?>>Canceled</option>
                                        <option value="0" <?php print_selected($status, "0"); ?>>Deleted</option>
                                    </select>
                                </div>
                                <div class="col-4 mt-2 d-grid">
                                    <span>&nbsp;</span>
                                    <button type="submit" class="btn btn-success btn-block">Filter</button>
                                </div>
                            </div>
                        </form>
                        <table id="companies" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $status_qry = " AND `o_status` != 0 ";
                                if ($status != "") {
                                    $status_qry = " AND `o_status` = '$status' ";
                                }
                                $res = mysqli_query($con, "SELECT * FROM `orders` WHERE `o_date` = '$date' " . $status_qry);
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["o_id"]; ?></td>
                                        <td><?php echo $row["o_name"]; ?></td>
                                        <td>
                                            <?php echo $row["o_mobile"]; ?><br>
                                            <?php echo $row["o_email"]; ?><br>
                                            <?php echo nl2br($row["o_address"]); ?><br>
                                        </td>
                                        <td><?php echo $row["o_total"]; ?></td>
                                        <td>
                                            <span class="sts"><?php echo $order_status_list[$row["o_status"]]; ?></span>
                                            <br>
                                            <select class="sts_update form-select form-control-sm mt-3 mb-2" data-ord="<?php echo $row["o_id"]; ?>">
                                                <option value="1" <?php print_selected($row["o_status"], "1"); ?>>Placed</option>
                                                <option value="2" <?php print_selected($row["o_status"], "2"); ?>>Out For Delivery</option>
                                                <option value="3" <?php print_selected($row["o_status"], "3"); ?>>Delivered</option>
                                                <option value="4" <?php print_selected($row["o_status"], "4"); ?>>Canceled</option>
                                                <option value="0" <?php print_selected($row["o_status"], "0"); ?>>Deleted</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success" onclick="location.href='print.php?order=<?php echo $row['o_id']; ?>'">Print</button>
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
                                $(document).ready(function() {
                                    $(".sts_update").change(function() {
                                        var $me = $(this);
                                        var sts = $(this).val();
                                        var ord = $(this).data("ord");
                                        $.ajax({
                                            type: "POST",
                                            url: "ajax.php",
                                            data: {
                                                update: 1,
                                                ord: ord,
                                                sts: sts
                                            },
                                            dataType: "text",
                                            success: function(resultData) {
                                                if (resultData == "Error") {
                                                    console.error("Error");
                                                } else {
                                                    $me.parent().find(".sts").html(resultData);
                                                }
                                            }
                                        });
                                    });
                                })
                            </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('footer.php') ?>