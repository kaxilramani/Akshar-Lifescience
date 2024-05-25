<?php
include("../config.php");
if (isset($_GET["order"])) {
    $oid = get_number("order");
    $res = mysqli_query($con, "SELECT * FROM `orders` WHERE `o_id` = '$oid'");
    if (mysqli_num_rows($res) == 1) {
        $order = mysqli_fetch_assoc($res);
    } else {
        header("location:index.php?s=0");
    }
} else {
    header("location:index.php?s=0");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>online medicine store - Responsive HTML5 Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="images/menu-arrow.jpg" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/menu-arrow.jpg">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pogo-slider.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/custom.css">

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">


    <div class="container" id="printable">
        <div class="row pb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-1 pt-3">
                        <div class="row">
                            <div class="col-3">
                                <h2 class=" font-weight-bold">ORDER ID <span class="float-right">:</span></h2>
                            </div>
                            <div class="col-3">
                                <h2 class=" font-weight-bold"><?php echo $order["o_id"]; ?></h2>
                            </div>
                            <div class="col-3">
                                <h2 class=" font-weight-bold">ORDER DATE <span class="float-right">:</span></h2>
                            </div>
                            <div class="col-3">
                                <h2 class=" font-weight-bold"><?php echo date("d-m-Y", strtotime($order["o_date"])); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <h2 class="font-weight-bold">Name </h2>
                            </div>
                            <div class="col-1 text-right">
                                <h2 class="font-weight-bold"> : </h2>
                            </div>
                            <div class="col-9">
                                <h2 class="font-weight-bold"><?php echo $order["o_name"]; ?></h2>
                            </div>
                            <div class="col-2">
                                <h2 class="font-weight-bold">Mobile </h2>
                            </div>
                            <div class="col-1 text-right">
                                <h2 class="font-weight-bold"> : </h2>
                            </div>
                            <div class="col-9">
                                <h2 class="font-weight-bold"><?php echo $order["o_mobile"]; ?></h2>
                            </div>
                            <div class="col-2">
                                <h2 class="font-weight-bold">Email </h2>
                            </div>
                            <div class="col-1 text-right">
                                <h2 class="font-weight-bold"> : </h2>
                            </div>
                            <div class="col-9">
                                <h2 class="font-weight-bold"><?php echo $order["o_email"]; ?></h2>
                            </div>
                            <div class="col-2">
                                <h2 class="font-weight-bold">Pincode </h2>
                            </div>
                            <div class="col-1 text-right">
                                <h2 class="font-weight-bold"> : </h2>
                            </div>
                            <div class="col-9">
                                <h2 class="font-weight-bold"><?php echo $order["o_pincode"]; ?></h2>
                            </div>
                            <div class="col-2">
                                <h2 class="font-weight-bold">Address </h2>
                            </div>
                            <div class="col-1 text-right">
                                <h2 class="font-weight-bold"> : </h2>
                            </div>
                            <div class="col-9">
                                <h2 class="font-weight-bold"><?php echo nl2br($order["o_address"]); ?></h2>
                            </div>
                            <div class="col-2">
                                <h2 class="font-weight-bold">Status </h2>
                            </div>
                            <div class="col-1 text-right">
                                <h2 class="font-weight-bold"> : </h2>
                            </div>
                            <div class="col-9">
                                <h2 class="font-weight-bold"><?php echo $order_status_list[$order["o_status"]]; ?></h2>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card bg-secondary d-md-block d-none">
                                    <div class="card-body py-3">
                                        <div class="row ">
                                            <div class="col-6">
                                                <h2 class="font-weight-bold pb-0 text-white">Medicine Name</h2>
                                            </div>
                                            <div class="col-2">
                                                <h2 class="font-weight-bold pb-0 text-white">Price</h2>
                                            </div>
                                            <div class="col-2">
                                                <h2 class="font-weight-bold pb-0 text-white">Units</h2>
                                            </div>
                                            <div class="col-2">
                                                <h2 class="font-weight-bold pb-0 text-white">Total</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $order["o_medicines"] = json_decode($order["o_medicines"], true);
                                foreach ($order["o_medicines"] as $med) {
                                ?>
                                    <div class="card my-3 border border-secondary">
                                        <div class="card-body py-3">
                                            <div class="row">
                                                <div class="col-md-6 my-auto">
                                                    <h2 class="font-weight-bold pb-md-0 pb-3"><?php echo mysqli_fetch_array(mysqli_query($con, "SELECT `m_name` FROM `medicines` WHERE `m_id` = " . $med["id"]))[0]; ?></h2>
                                                </div>
                                                <div class="col-md-2 col-4 my-auto">
                                                    <span class="d-md-none hide-and-seek">Price</span>
                                                    <h2 class="font-weight-bold pb-0"><?php echo $med["price"]; ?></h2>
                                                </div>
                                                <div class="col-md-2 col-4 my-auto">
                                                    <span class="d-md-none hide-and-seek">Units</span>
                                                    <h2 class="font-weight-bold pb-0"><?php echo $med["units"]; ?></h2>
                                                </div>
                                                <div class="col-md-2 col-4 my-auto">
                                                    <span class="d-md-none hide-and-seek">Total</span>
                                                    <h2 class="font-weight-bold pb-0 total"><?php echo $med["total"]; ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="card my-3 border border-secondary">
                                    <div class="card-body py-3">
                                        <div class="row">
                                            <div class="col-md-8 mb-md-0 mb-2">
                                                <h1 class="font-weight-bold pb-0"><?php echo count($order["o_medicines"]); ?> Medicines</h1>
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <h1 class="font-weight-bold pb-0">Total</h1>
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <h1 class="font-weight-bold pb-0" id="total"><?php echo $order["o_total"]; ?>/-</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 printable_hide text-center pt-5">
                <button class="btn btn-outline-secondary btn-lg mr-2" onclick="location.href='orders.php'">Back to Orders</button>
                <button class="btn btn-success btn-lg ml-2" onclick="window.print();">Print</button>
            </div>
            <style>
                @media print {
                    body * {
                        visibility: hidden;
                    }

                    #printable,
                    #printable * {
                        visibility: visible;
                    }

                    #printable {
                        position: absolute;
                        left: 0;
                        top: 0;
                    }

                    .printable_hide,
                    .printable_hide * {
                        visibility: hidden;
                        display: none;
                    }
                }
            </style>
        </div>
    </div>

    <!-- ALL JS FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.pogo-slider.min.js"></script>
    <script src="../js/slider-index.js"></script>
    <!-- <script src="../js/smoothscroll.js"></script> -->
    <script src="../js/TweenMax.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>
    <script src="../js/isotope.min.js"></script>
    <script src="../js/images-loded.min.js"></script>
    <script src="../js/custom.js"></script>
    <?php
    if (!function_exists("script")) {
        function script()
        {
        }
    }
    script();
    ?>
</body>

</html>