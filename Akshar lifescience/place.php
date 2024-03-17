<?php
include("./config.php");

$name = mysqli_real_escape_string($con, post_string("name"));
$mobile = mysqli_real_escape_string($con, post_string("mobile"));
$email = mysqli_real_escape_string($con, post_string("email"));
$pincode = mysqli_real_escape_string($con, post_string("pincode"));
$address = mysqli_real_escape_string($con, post_string("address"));

mysqli_query($con, "UPDATE `users` SET `u_pincode` = '$pincode', `u_address` = '$address' WHERE `u_id` = " . $_SESSION["user_id"]);

$cart = $_SESSION["cart"];
$cart[0] = 0;
$med_ids = array_keys($cart);
$med_ids_string = "(" . implode(",", $med_ids) . ")";
$mes_res = mysqli_query($con, "SELECT * FROM `medicines` WHERE `m_id` IN $med_ids_string");
$cart_items = array();
$total = 0.0;
if (mysqli_num_rows($mes_res) > 0) {
    while ($med = mysqli_fetch_assoc($mes_res)) {
        $cart_items[] = array(
            "id" => $med["m_id"],
            "units" => $cart[$med["m_id"]],
            "price" => $med["m_price"],
            "total" => (floatval($cart[$med["m_id"]]) * floatval($med["m_price"]))
        );
        $total += (floatval($cart[$med["m_id"]]) * floatval($med["m_price"]));
    }
}

$u_id = $_SESSION["user_id"];
$meds = mysqli_real_escape_string($con, json_encode($cart_items));

$date = date("Y-m-d");

$qry = "INSERT INTO `orders`(`o_date`, `o_user`, `o_name`, `o_mobile`, `o_email`, `o_pincode`, `o_address`, `o_medicines`, `o_total`) VALUES ('$date', '$u_id', '$name', '$mobile', '$email', '$pincode', '$address', '$meds', '$total')";

$res = mysqli_query($con, $qry);
if ($res) {
    $_SESSION["cart"] = array();
    header("location:payment/pay.php?s=1");
} else {
    header("location:payment/pay.php?s=0");
}
