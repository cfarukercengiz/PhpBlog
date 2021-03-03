<?php $page = 'portfolio';
include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>


    <!-- Inside Hero Section -->
    <section class="page-image page-image-portfolio md-padding">
        <h1 class="text-white text-center">PORTFOLIO</h1>
    </section>


    <!-- Portfolio Section -->
    <section id="portfolio" class="md-padding">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 offset-md-3">
                    <div class="section-header mb-5">
                        <h2 class="title">Our Works</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam cum doloremque
                            ducimus eaque, ex exercitationem ipsa officia officiis provident quas quisquam quo sunt!</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                $sql_query = "SELECT * FROM portfolios";
                $select_all_portfolios = mysqli_query($conn, $sql_query);

                while ($row = mysqli_fetch_assoc($select_all_portfolios)) {
                    $portfolio_id = $row["portfolio_id"];
                    $portfolio_name = $row["portfolio_name"];
                    $portfolio_category = $row["portfolio_category"];
                    $portfolio_img_sm = $row["portfolio_img_sm"];
                    $portfolio_img_bg = $row["portfolio_img_bg"];
                    ?>

                    <div class="col-md-4 portfolio-item">
                        <a href="img/portfolio/<?php echo $portfolio_img_bg; ?>" class="portfolio-link"
                           data-lightbox="lightbox-gallery"
                           data-title="<?php echo $portfolio_name; ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-search fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/portfolio/<?php echo $portfolio_img_sm; ?>" class="img-fluid">
                        </a>
                        <div class="portfolio-caption">
                            <h4><?php echo $portfolio_name; ?></h4>
                            <p class="text-muted"><?php echo $portfolio_category; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>


    <!-- Footer Section -->
<?php include "includes/footer.php"; ?>