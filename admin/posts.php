<?php include "includes/admin_header.php"; ?>

    <div id="layoutSidenav">

<?php include "includes/admin_sidebar.php"; ?>


    <div id="layoutSidenav_content">
    <main>
    <div class="container-fluid mt-4">
    <h1>Welcome to Posts Page</h1>
    <hr>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Date</th>
            <th>Comments</th>
            <th>Image</th>
            <th>Text</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php
        //POST ADD SECTION
        if (isset($_POST["add_post"])) {
            $post_title = $_POST["post_title"];
            $post_category = $_POST["post_category"];
            $post_author = $_POST["post_author"];
            $post_tags = $_POST["post_tags"];
            $post_text = $_POST["post_text"];
            $post_date = date("d-m-y");
            $post_comment_number = 8;
            $post_hits = 0;

            $post_image = $_FILES["post_image"]["name"];
            $post_image_temp = $_FILES["post_image"]["tmp_name"];
            move_uploaded_file($post_image_temp, "../img/post/$post_image");

            $query = "INSERT INTO posts (post_title,post_category,post_author,post_text,post_tags,post_date,post_comment_number,post_image,post_hits)";
            $query .= "VALUES ('{$post_title}','{$post_category}','{$post_author}','{$post_text}','{$post_tags}',now(),'{$post_comment_number}','{$post_image}','{$post_hits}')";

            $create_post_query = mysqli_query($conn, $query);
            header("Location: posts.php");
        }
        ?>

        <?php
        //POST EDIT SECTION
        if (isset($_POST["edit_post"])) {
            $post_title = $_POST["post_title"];
            $post_category = $_POST["post_category"];
            $post_author = $_POST["post_author"];
            $post_tags = $_POST["post_tags"];
            $post_text = $_POST["post_text"];

            $post_image = $_FILES["post_image"]["name"];
            $post_image_temp = $_FILES["post_image"]["tmp_name"];

            if (empty($post_image)) {
                $query2 = "SELECT * FROM posts WHERE post_id='$_POST[post_id]'";
                $select_image = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_assoc($select_image)) {
                    $post_image = $row["post_image"];
                }
            }

            move_uploaded_file($post_image_temp, "../img/post/$post_image");

            $sql_query2 = "UPDATE posts SET post_title='$post_title',post_category='$post_category',post_author='$post_author',
            post_tags='$post_tags',post_text='$post_text',post_image='$post_image' WHERE post_id='$_POST[post_id]'";

            $edit_post_query = mysqli_query($conn, $sql_query2);
            header("Location: posts.php");

        }
        ?>


        <?php
        //POST LIST SECTION
        $sql_query = "SELECT * FROM posts ORDER BY post_id DESC ";
        $select_all_posts = mysqli_query($conn, $sql_query);
        $k = 1;
        while ($row = mysqli_fetch_assoc($select_all_posts)) {
            $post_id = $row["post_id"];
            $post_category = $row["post_category"];
            $post_title = $row["post_title"];
            $post_author = $row["post_author"];
            $post_date = $row["post_date"];
            $post_image = $row["post_image"];
            $post_text = substr($row["post_text"], 0, 100);
            $post_tags = $row["post_tags"];

            $query = "SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status='approved'";
            $select_comment_query = mysqli_query($conn, $query);
            $post_comment_number = mysqli_num_rows($select_comment_query);

            echo "<tr>
            <td>{$post_id}</td>
            <td>{$post_title}</td>
            <td>{$post_category}</td>
            <td>{$post_author}</td>
            <td>{$post_date}</td>
            <td>{$post_comment_number}</td>
            <td><img src='../img/post/$post_image' width='90px' height='90px'></td>
            <td>{$post_text}</td>
            <td>{$post_tags}</td>
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
                        <a class='dropdown-item' href='posts.php?delete={$post_id}'>Delete</a>                 
                    </div>
                </div>
            </td>
        </tr>";
            ?>


            <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="post_title">Post Title</label>
                                    <input type="text" class="form-control" name="post_title"
                                           value="<?php echo $post_title; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="post_category">Post Category</label>
                                    <select name="post_category" class="form-control">
                                        <?php
                                        //SELECT SHOW CATEGORY NAME
                                        $post_category_sql = "SELECT * FROM categories";
                                        $post_category_run = mysqli_query($conn, $post_category_sql);
                                        while ($post_category_row = mysqli_fetch_assoc($post_category_run)) {
                                            $post_category_final = $post_category_row["category_name"];

                                            if ($post_category_row["category_name"] == $row["post_category"]) {
                                                echo "<option selected>$post_category_final</option>";
                                            } else {
                                                echo "<option>$post_category_final</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="post_author">Post Author</label>
                                    <input type="text" class="form-control" name="post_author"
                                           value="<?php echo $post_author; ?>">
                                </div>

                                <div class="form-group">
                                    <img width="100" src="../img/post/<?php echo $post_image; ?>">
                                    <input type="file" class="form-control" name="post_image">
                                </div>
                                <div class="form-group">
                                    <label for="post_tags">Post Tags</label>
                                    <input type="text" class="form-control" name="post_tags"
                                           value="<?php echo $post_tags; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="post_text">Post Text</label>
                                    <textarea class="form-control" name="post_text" id="" cols="20"
                                              rows="5"><?php echo $row["post_text"]; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="post_id" value="<?php echo $row["post_id"]; ?>">
                                    <input type="submit" class="btn btn-primary" name="edit_post"
                                           value="Edit Post">
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

    <a class="btn btn-lg btn-success" data-toggle="modal" data-target="#add_modal">Add New Post</a>

    <div id="add_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="post_title">Post Title</label>
                            <input type="text" class="form-control" name="post_title">
                        </div>
                        <div class="form-group">
                            <label for="post_category">Post Category</label>
                            <select name="post_category" class="form-control">
                                <?php
                                //SELECT SHOW CATEGORY NAME
                                $post_category_sql = "SELECT * FROM categories";
                                $post_category_run = mysqli_query($conn, $post_category_sql);
                                while ($post_category_row = mysqli_fetch_assoc($post_category_run)) {
                                    $post_category_final = $post_category_row["category_name"];
                                    echo "<option>$post_category_final</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_author">Post Author</label>
                            <input type="text" class="form-control" name="post_author">
                        </div>

                        <div class="form-group">
                            <label for="post_image">Post Image</label>
                            <input type="file" class="form-control" name="post_image">
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Post Tags</label>
                            <input type="text" class="form-control" name="post_tags">
                        </div>
                        <div class="form-group">
                            <label for="post_text">Post Text</label>
                            <textarea class="form-control" name="post_text" id="" cols="20"
                                      rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="post_id" value="">
                            <input type="submit" class="btn btn-primary" name="add_post" value="Add Post">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
//POST DELETE SECTION
if (isset($_GET["delete"])) {
    $delete_post_id = $_GET["delete"];

    $select_query = "SELECT * FROM posts WHERE post_id={$delete_post_id}";
    $select_del_img = mysqli_query($conn, $select_query);
    if (!$select_del_img) {
        die("QUERY FAILED " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($select_del_img)) {
        $post_image = $row["post_image"];
        unlink("../img/post/$post_image");
    }


    $query = "DELETE FROM posts WHERE post_id={$delete_post_id}";
    $delete_post_query = mysqli_query($conn, $query);
    header("Location: posts.php");
}

?>


<?php include "includes/admin_footer.php"; ?>