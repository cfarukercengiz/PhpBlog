<?php include "includes/admin_header.php"; ?>

    <div id="layoutSidenav">

<?php include "includes/admin_sidebar.php"; ?>


    <div id="layoutSidenav_content">
    <main>
    <div class="container-fluid mt-4">
    <h1>Welcome to Portfolios Page</h1>
    <hr>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Portfolio Name</th>
            <th>Portfolio Category</th>
            <th>Small Image</th>
            <th>Big Image</th>
            <th>Add - Edit - Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //PORTFOLIO ADD SECTION
        if (isset($_POST["add_portfolio"])) {
            $portfolio_name = $_POST["portfolio_name"];
            $portfolio_category = $_POST["portfolio_category"];

            $portfolio_image_sm = $_FILES["image"]["name"];
            $portfolio_image_sm_temp = $_FILES["image"]["tmp_name"];
            $portfolio_image_bg = $_FILES["imagebg"]["name"];
            $portfolio_image_bg_temp = $_FILES["imagebg"]["tmp_name"];

            move_uploaded_file($portfolio_image_sm_temp, "../img/portfolio/$portfolio_image_sm");
            move_uploaded_file($portfolio_image_bg_temp, "../img/portfolio/$portfolio_image_bg");

            $query = "INSERT INTO portfolios (portfolio_name,portfolio_category,portfolio_img_sm,portfolio_img_bg)";
            $query .= "VALUES('{$portfolio_name}','{$portfolio_category}','{$portfolio_image_sm}','{$portfolio_image_bg}')";

            $create_portfolio_query = mysqli_query($conn, $query);
            if (!$create_portfolio_query) {
                die("Query Failed: " . mysqli_error($conn));
            }
            header("Location: portfolios.php");
        }
        ?>

        <?php
        //PORTFOLIO EDIT SECTION
        if (isset($_POST["edit_portfolio"])) {
            $portfolio_name = $_POST["portfolio_name"];
            $portfolio_category = $_POST["portfolio_category"];
            $portfolio_img_sm = $_FILES["image"]["name"];
            $portfolio_img_bg = $_FILES["imagebg"]["name"];
            $portfolio_img_sm_temp = $_FILES["image"]["tmp_name"];
            $portfolio_img_bg_temp = $_FILES["imagebg"]["tmp_name"];

            if (empty($portfolio_img_sm)) {
                $query2 = "SELECT * FROM portfolios WHERE portfolio_id='$_POST[portfolio_id]'";
                $select_image_sm = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_assoc($select_image_sm)) {
                    $portfolio_img_sm = $row["portfolio_img_sm"];
                }
            }

            if (empty($portfolio_img_bg)) {
                $query3 = "SELECT * FROM portfolios WHERE portfolio_id='$_POST[portfolio_id]'";
                $select_image_bg = mysqli_query($conn, $query3);
                while ($row = mysqli_fetch_assoc($select_image_bg)) {
                    $portfolio_img_bg = $row["portfolio_img_bg"];
                }
            }

            move_uploaded_file($portfolio_img_sm_temp, "../img/portfolio/$portfolio_img_sm");
            move_uploaded_file($portfolio_img_bg_temp, "../img/portfolio/$portfolio_img_bg");

            $sql_query2 = "UPDATE portfolios SET portfolio_name='{$portfolio_name}',portfolio_category=
            '{$portfolio_category}',portfolio_img_sm='{$portfolio_img_sm}',portfolio_img_bg='{$portfolio_img_bg}' WHERE portfolio_id='$_POST[portfolio_id]'";

            $edit_portfolio_query = mysqli_query($conn, $sql_query2);
            header("Location: portfolios.php");
        }


        ?>

        <?php
        //PORTFOLIO LIST SECTION
        $sql_query = "SELECT * FROM portfolios ORDER BY portfolio_id DESC ";
        $select_all_portfolios = mysqli_query($conn, $sql_query);
        $k = 1;
        while ($row = mysqli_fetch_assoc($select_all_portfolios)) {
            $portfolio_id = $row["portfolio_id"];
            $portfolio_name = $row["portfolio_name"];
            $portfolio_category = $row["portfolio_category"];
            $portfolio_img_sm = $row["portfolio_img_sm"];
            $portfolio_img_bg = $row["portfolio_img_bg"];

            echo "<tr>
            <td>{$portfolio_id}</td>
            <td>{$portfolio_name}</td>
            <td>{$portfolio_category}</td>
            <td><img src='../img/portfolio/$portfolio_img_sm' width='90px' height='90px'></td>
            <td><img src='../img/portfolio/$portfolio_img_bg' width='90px' height='90px'></td>
            <td>
                <div class='dropdown'>
                    <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton'
                            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Actions
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k'
                           href='#'> Edit</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='portfolios.php?delete={$portfolio_id}'> Delete</a>
                    </div>
                </div>
            </td>
        </tr>";
            ?>
            <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit Portfolio </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="portfolio_name"> Portfolio Name </label>
                                    <input type="text" class="form-control" name="portfolio_name"
                                           value="<?php echo $portfolio_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="portfolio_category"> Portfolio Category </label>
                                    <select name="portfolio_category" class="form-control">
                                        <?php
                                        //SELECT SHOW CATEGORY NAME
                                        $portfolio_category_sql = "SELECT * FROM categories";
                                        $portfolio_category_run = mysqli_query($conn, $portfolio_category_sql);
                                        while ($portfolio_category_row = mysqli_fetch_assoc($portfolio_category_run)) {
                                            $portfolio_category_final = $portfolio_category_row["category_name"];

                                            if ($portfolio_category_row["category_name"] == $row["portfolio_category"]) {
                                                echo "<option selected>$portfolio_category_final</option>";
                                            } else {
                                                echo "<option>$portfolio_category_final</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <img width="100" src="../img/portfolio/<?php echo $portfolio_img_sm; ?>">
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <img width="100" src="../img/portfolio/<?php echo $portfolio_img_bg; ?>">
                                    <input type="file" class="form-control" name="imagebg">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="portfolio_id"
                                           value="<?php echo $row["portfolio_id"]; ?>">
                                    <input type="submit" class="btn btn-primary" name="edit_portfolio"
                                           value="Edit Portfolio">
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

    <a class="btn btn-lg btn-success" data-toggle="modal" data-target="#add_modal">Add New Portfolio</a>

    <div id="add_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Add New Portfolio </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="portfolio_name"> Portfolio Name </label>
                            <input type="text" class="form-control" name="portfolio_name">
                        </div>
                        <div class="form-group">
                            <label for="portfolio_category"> Portfolio Category </label>
                            <select name="portfolio_category" class="form-control">
                                <?php
                                //SELECT SHOW CATEGORY NAME
                                $portfolio_category_sql = "SELECT * FROM categories";
                                $portfolio_category_run = mysqli_query($conn, $portfolio_category_sql);
                                while ($portfolio_category_row = mysqli_fetch_assoc($portfolio_category_run)) {
                                    $portfolio_category_final = $portfolio_category_row["category_name"];
                                    echo "<option>$portfolio_category_final</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="portfolio_image_sm"> Small Image </label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label for="portfolio_image_bg"> Big Image </label>
                            <input type="file" class="form-control" name="imagebg">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="add_portfolio"
                                   value="Add Portfolio">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
//PORTFOLIO DELETE SECTION
if (isset($_GET["delete"])) {
    $delete_portfolio_id = $_GET["delete"];

    $select_query = "SELECT * FROM portfolios WHERE portfolio_id={$delete_portfolio_id}";
    $select_del_img = mysqli_query($conn, $select_query);
    if (!$select_del_img) {
        die("QUERY FAILED " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($select_del_img)) {
        $portfolio_img_sm = $row["portfolio_img_sm"];
        $portfolio_img_bg = $row["portfolio_img_bg"];
        unlink("../img/portfolio/$portfolio_img_sm");
        unlink("../img/portfolio/$portfolio_img_bg");
    }


    $query = "DELETE FROM portfolios WHERE portfolio_id={$delete_portfolio_id}";
    $delete_portfolio_query = mysqli_query($conn, $query);
    header("Location: portfolios.php");
}

?>


<?php include "includes/admin_footer.php"; ?>