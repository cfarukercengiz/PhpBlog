<nav class="navbar navbar-container navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">PhpBlog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            MENU <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link <?php if ($page == 'index') {
                        echo "active";
                    } ?>">Home</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link <?php if ($page == 'about') {
                        echo "active";
                    } ?>">About</a></li>
                <li class="nav-item"><a href="portfolio.php" class="nav-link <?php if ($page == 'portfolio') {
                        echo "active";
                    } ?>">Portfolio</a></li>
                <li class="nav-item"><a href="blog.php" class="nav-link <?php if ($page == 'blog') {
                        echo "active";
                    } ?>">Blog</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link <?php if ($page == 'contact') {
                        echo "active";
                    } ?>">Contact</a></li>

                <?php if ($_SESSION["username"] !== null) {
                    echo "<li class='nav-item'><a href='admin/index.php' class='nav-link'>Admin Panel</a></li>";
                } else {
                    echo "<li class='nav-item'><a href='admin/login.php' class='nav-link'>Admin Panel</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>