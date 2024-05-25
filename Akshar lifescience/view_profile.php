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
        <h1 class="mt-4">My Profile</h1>
        <ol class="breadcrumb mb-4">
			<div class="sb-nav-link-icon">Users Name :</i>
                <?php echo $_SESSION["user_name"] ?>
            </div>
        </ol>

    </div>
</main>
<?php include("footer.php"); ?> 