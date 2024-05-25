<?php
if (!isset($_SESSION["admin_id"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin</title>
    <link rel="shortcut icon" href="../images/menu-arrow.jpg" type="image/x-icon">
	<link rel="apple-touch-icon" href="menu-arrow.jpg">
    <link href="public/vendors/datatables/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="public/css/styles.css" rel="stylesheet" />
    <script src="public/vendors/fontawesome/js/all.min.js"></script>
    <style>
        .btn-container {
            position: relative;
        }

        .btn-container .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            visibility: hidden;
        }

        .btn-container:hover .btn {
            visibility: visible;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Akshar Lifescience</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <ul class="navbar-nav ms-auto pe-4">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard 
                        </a>
    
                        <a class="nav-link" href="users.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Users
                        </a>
                        <a class="nav-link" href="orders.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
                            Orders
                        </a>
                        <a class="nav-link" href="categories.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                            Categories
                        </a>
                        <a class="nav-link" href="companies.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                            Companies
                        </a>
                        <a class="nav-link" href="medicines.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-pills"></i></div>
                            Medicines
                        </a>
                        <a class="nav-link" href="contacts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-phone-alt"></i></div>
                            Contacts
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div iv>
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i>
                    <?php echo $_SESSION["admin_name"] ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
    