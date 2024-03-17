<?php
include("config.php");
include("header.php");
?>
<main>
    <style>
        .citem {
            min-height: 7rem;
        }

        .citemi {
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 5rem;
        }
    </style>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row ">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body citem">
                        <h2> Total Orders :</h2>
                        <h2><?php echo mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM `orders`"))[0]; ?></h2>
                        <!-- <i class="fa fa-shopping-bag citemi"></i> -->
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="orders.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body citem">
                        <h2>Medicines :</h2>
                        <h2><?php echo mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM `medicines`"))[0]; ?></h2>
                        <!-- <i class="fa fa-pills citemi"></i> -->
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="medicines.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body citem">
                        <h2>Total User :</h2>
                        <h2><?php echo mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM `users`"))[0]; ?></h2>
                        <!-- <i class="fa fa-users citemi"></i> -->
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="users.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body citem">
                        <h3>Contacts :</h3>
                        <h2><?php echo mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM `contacts`"))[0]; ?></h2>
                        <!-- <i class="fa fa-phone-alt citemi"></i> -->
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="contacts.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-none">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include("footer.php"); ?>