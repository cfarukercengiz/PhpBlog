<aside id="aside" class="col-md-4">
    <!-- Search Widget -->
    <div class="widget">
        <div class="widget-search">
            <form action="./search.php" method="post">
                <input type="text" name="search" class="search-input form-control" placeholder="Search">
                <button class="search-btn" name="search_btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- Search Widget END -->

    <!-- Category Widget -->
    <div class="widget">
        <h3 class="mb-3">Categories</h3>
        <div class="widget-category">
            <?php
            $sql_query = "SELECT * FROM categories ORDER BY category_id DESC ";
            $select_all_categories = mysqli_query($conn, $sql_query);

            while ($row = mysqli_fetch_assoc($select_all_categories)) {
                $category_name = $row["category_name"];

                $query2 = "SELECT * FROM posts WHERE post_category='$category_name'";
                $send_category_query = mysqli_query($conn, $query2);
                $count_category_posts = mysqli_num_rows($send_category_query);

                echo "<a href='category.php?category=$category_name'>{$category_name}<span>({$count_category_posts})</span></a>";
            }
            ?>
        </div>
    </div>
    <!-- Category Widget END -->
</aside>