<?php $page = 'blog';
include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Inside Hero Section -->
    <section class="page-image page-image-about md-padding">
        <h1 class="text-white text-center">PHP FEATURES</h1>
    </section>

    <!-- Blog Post Section -->
    <section id="blog" class="md-padding">
        <div class="container">
            <div class="row">

                <?php
                //SINGLE POST LIST SECTION
                if (isset($_GET["look"])) {
                    $p_post_id = $_GET["look"];
                    $sql_query2 = "UPDATE posts SET post_hits=post_hits + 1 WHERE post_id=$p_post_id";
                    $sql_query2_run = mysqli_query($conn, $sql_query2);
                }

                $sql_query = "SELECT * FROM posts WHERE post_id= $p_post_id";
                $select_all_posts = mysqli_query($conn, $sql_query);

                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_hits = $row["post_hits"];
                $post_title = ucfirst($row["post_title"]);
                $post_text = substr($row["post_text"], 0, 100);
                $post_image = $row["post_image"];
                $post_tags = explode(",", $row["post_tags"]);
                ?>

                <main id="main" class="col-md-8">
                    <div class="blog">
                        <div class="blog-img">
                            <img src="img/post/<?php echo $post_image; ?>" class="img-fluid">
                        </div>
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><i class="fas fa-user"></i><?php echo $post_author; ?></li>
                                <li><i class="fas fa-clock"></i><?php echo $post_date; ?></li>
                                <li><i class="fas fa-eye"></i><?php echo $post_hits; ?></li>
                                <li>Tags: <?php
                                    foreach ($post_tags as &$post_tag) {
                                        $post_tag = "<a class='btn btn-warning btn-sm'>$post_tag</a>";
                                    }
                                    echo implode(" ", $post_tags);
                                    ?></li>
                            </ul>
                            <h3><?php echo $post_title; ?></h3>
                            <p><?php echo $row["post_text"]; ?></p>
                        </div>
                        <?php } ?>

                        <?php
                        //COMMENTS LIST SECTION
                        $query = "SELECT * FROM comments WHERE comment_post_id=$p_post_id AND comment_status='approved'";
                        $query .= "ORDER BY comment_id DESC";

                        $select_comment_query = mysqli_query($conn, $query);
                        $count_post_comments = mysqli_num_rows($select_comment_query);
                        ?>

                        <!-- Blog Comments -->
                        <div class="blog-comments">
                            <h3>(<?php echo $count_post_comments; ?>) Comments</h3>

                            <?php
                            while ($row = mysqli_fetch_assoc($select_comment_query)) {
                                $comment_author = $row["comment_author"];
                                $comment_date = $row["comment_date"];
                                $comment_text = $row["comment_text"];
                                ?>

                                <!-- Comment -->
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $comment_author; ?> <span
                                                    class="time"><?php echo $comment_date; ?></span></h4>
                                        <p><?php echo $comment_text; ?></p>
                                    </div>
                                </div>
                                <!-- Comment END -->
                            <?php } ?>

                            <?php
                            //INSERT COMMENTS DATABASE
                            if (isset($_POST["create_comment"])) {

                                $p_post_id = $_GET["look"];

                                $comment_author = $_POST["comment_author"];
                                $comment_email = $_POST["comment_email"];
                                $comment_text = $_POST["comment_text"];

                                $insert_query = "INSERT INTO comments (comment_post_id,comment_date,comment_author,comment_email,comment_text,comment_status)";
                                $insert_query .= "VALUES ($p_post_id,now(),'{$comment_author}','{$comment_email}','{$comment_text}','unapproved')";

                                $create_comment_query = mysqli_query($conn, $insert_query);
                                header("Location: blog-single.php?look={$p_post_id}");
                            }
                            ?>

                        </div>
                        <!-- Blog Comments END -->

                        <!-- Reply Form -->
                        <div class="reply-form">
                            <h3>Leave A Comment</h3>
                            <form action="" method="post">
                                <input class="form-control mb-4" type="text" name="comment_author" placeholder="Name">
                                <input class="form-control mb-4" type="email" name="comment_email" placeholder="Email">
                                <textarea class="form-control mb-4" row="5" name="comment_text"
                                          placeholder="Add Your Commment"></textarea>

                                <button type="submit" name="create_comment" class="hero-btn">Send</button>
                            </form>
                        </div>
                        <!-- Reply Form END -->
                    </div>
                </main>
                <?php include "includes/sidebar.php"; ?>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
<?php include "includes/footer.php"; ?>