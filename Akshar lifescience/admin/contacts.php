<?php
include('config.php');

include('header.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Contacts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Contacts</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-list"></i>
                        All Contacts
                    </div>
                    <div class="card-body">
                        <table id="companies" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $res = mysqli_query($con, "SELECT * FROM `contacts` ORDER BY `c_id` DESC");
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["c_id"]; ?></td>
                                        <td><?php echo $row["c_name"]; ?></td>
                                        <td><?php echo $row["c_email"]; ?></td>
                                        <td><?php echo $row["c_mobile"]; ?></td>
                                        <td><?php echo nl2br($row["c_message"]); ?></td>
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
                                $("#companies").DataTable({
                                    order: [
                                        [0, "desc"]
                                    ]
                                });
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