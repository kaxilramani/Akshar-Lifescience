<?php
include('config.php');

if (isset($_POST["update"])) {
    $name = mysqli_real_escape_string($con, post_string("name"));
    $email = mysqli_real_escape_string($con, post_string("email"));
    $mobile = mysqli_real_escape_string($con, post_string("mobile"));
    
    $uid = get_number("edit");

    $qry = "UPDATE `users` SET `u_name` = '$name', `u_email` = '$email', `u_mobile` = '$mobile' WHERE `u_id` = '$uid'";
    if (mysqli_query($con, $qry)) {
        header("location:users.php?s=1");
    } else {
        header("location:users.php?s=0");
    }
}

if (isset($_GET["edit"])) {
    $uid = get_number("edit");
    $res = mysqli_query($con, "SELECT * FROM `users` WHERE `u_id` = $uid");
    if (mysqli_num_rows($res)  == 1) {
        $edit = mysqli_fetch_assoc($res);
    } else {
        header("location:users.php?s=0");
    }
}

include('header.php');
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($edit)) {
                ?>
                    <form method="post">
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-user-plus"></i>
                                Update User
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 form-group">
                                        <label for="name">Name :</label>
                                        <input type="text" name="name" id="name" value="<?php echo $edit["u_name"]; ?>" class="form-control">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="email">Email :</label>
                                        <input type="email" name="email" id="email" value="<?php echo $edit["u_email"]; ?>" class="form-control">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="mobile">Mobile :</label>
                                        <input type="text" name="mobile" id="mobile" value="<?php echo $edit["u_mobile"]; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="update" class="btn btn-primary">Update User</button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-users"></i>
                            All Users
                        </div>
                        <div class="card-body">
                            <table id="users" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM `users`");
                                    while ($user = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $user["u_id"]; ?></td>
                                            <td><?php echo $user["u_name"]; ?></td>
                                            <td><?php echo $user["u_mobile"]; ?></td>
                                            <td><?php echo $user["u_email"]; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success" onclick="location.href='?edit=<?php echo $user['u_id']; ?>'">Edit</button>
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
                                    $("#users").DataTable();
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