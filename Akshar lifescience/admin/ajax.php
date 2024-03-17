<?php
include("config.php");
if (isset($_POST["update"])) {
    $ord = $_POST["ord"];
    $sts = $_POST["sts"];
    $res = mysqli_query($con, "UPDATE `orders` SET `o_status` = '$sts' WHERE `o_id` = '$ord'");
    if ($res) {
        echo $order_status_list[$sts];
    } else {
        echo "Error";
    }
    exit();
}
