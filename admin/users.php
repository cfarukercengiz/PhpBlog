<?php include "includes/admin_header.php"; ?>

    <div id="layoutSidenav">

<?php include "includes/admin_sidebar.php"; ?>


    <div id="layoutSidenav_content">
    <main>
    <div class="container-fluid mt-4">
    <h1>Welcome to Users Page</h1>
    <hr>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php
        //USER ADD SECTION
        if (isset($_POST["add_user"])) {
            $user_name = $_POST["user_name"];
            $user_password = $_POST["user_password"];
            $user_email = $_POST["user_email"];
            $user_role = $_POST["user_role"];

            $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (user_name,user_password,user_email,user_role)";
            $query .= "VALUES ('{$user_name}','{$hashed_password}','{$user_email}','{$user_role}')";

            $create_user_query = mysqli_query($conn, $query);
            if (!$create_user_query) {
                die("Query Failed: " . mysqli_error($conn));
            }
            header("Location: users.php");
        }
        ?>

        <?php
        //USER EDIT SECTION
        if (isset($_POST["edit_user"])) {
            $user_name = $_POST["user_name"];
            $user_password = $_POST["user_password"];
            $user_email = $_POST["user_email"];
            $user_role = $_POST["user_role"];

            $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

            $sql_query2 = "UPDATE users SET user_name='$user_name',user_password='$hashed_password',user_email='$user_email',
            user_role='$user_role' WHERE user_id='$_POST[user_id]'";

            $edit_user_query = mysqli_query($conn, $sql_query2);
            header("Location: users.php");

        }
        ?>

        <?php
        //USER LIST SECTION
        $sql_query = "SELECT * FROM users ORDER BY user_id DESC ";
        $select_all_users = mysqli_query($conn, $sql_query);
        $k = 1;
        while ($row = mysqli_fetch_assoc($select_all_users)) {
            $user_id = $row["user_id"];
            $user_name = $row["user_name"];
            $user_password = $row["user_password"];
            $user_email = $row["user_email"];
            $user_role = $row["user_role"];

            echo "<tr>
            <td>{$user_id}</td>
            <td>{$user_name}</td>
            <td>{$user_email}</td>
            <td>{$user_password}</td>
            <td>{$user_role}</td>
            <td>
                <div class='dropdown'>
                    <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton'
                            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Actions
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k'
                           href='#'>Edit</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='users.php?delete={$user_id}'>Delete</a>
                    </div>
                </div>
            </td>
        </tr>";
            ?>

            <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="user_name">User Name</label>
                                    <input type="text" class="form-control" name="user_name"
                                           value="<?php echo $user_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="user_email">User Email</label>
                                    <input type="email" class="form-control" name="user_email"
                                           value="<?php echo $user_email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="user_password">User Password</label>
                                    <input type="password" class="form-control" name="user_password"
                                           value="<?php echo $user_password; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="user_role">User Role</label>
                                    <select class="form-control" name="user_role">
                                        <option><?php echo $user_role; ?></option>

                                        <?php
                                        if ($user_role == 'admin') {
                                            echo "<option value='subscriber'>subscriber</option>";
                                        } else {
                                            echo "<option value='admin'>admin</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="<?php echo $row["user_id"]; ?>">
                                    <input type="submit" class="btn btn-primary" name="edit_user"
                                           value="Edit User">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $k++;
        } ?>
        </tbody>
    </table>

    <a class="btn btn-lg btn-success" data-toggle="modal" data-target="#add_modal">Add New User</a>

    <div id="add_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>
                        <div class="form-group">
                            <label for="user_email">User Email</label>
                            <input type="email" class="form-control" name="user_email">
                        </div>
                        <div class="form-group">
                            <label for="user_password">User Password</label>
                            <input type="password" class="form-control" name="user_password">
                        </div>

                        <div class="form-group">
                            <label for="user_role">User Role</label>
                            <select class="form-control" name="user_role">
                                <option value="admin">admin</option>
                                <option value="subscriber">subscriber</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user_id" value="">
                            <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
//USER DELETE SECTION
if (isset($_GET["delete"])) {
    $delete_user_id = $_GET["delete"];
    $query = "DELETE FROM users WHERE user_id={$delete_user_id}";
    $delete_user_query = mysqli_query($conn, $query);
    header("Location: users.php");
}

?>


<?php include "includes/admin_footer.php"; ?>