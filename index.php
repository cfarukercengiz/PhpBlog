<?php $page = 'index';
include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Hero Section -->
    <header id="hero">
        <div class="container">
            <div class="hero-text">
                <h1 class="text-white">Welcome To NodeDemo</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit cum velit sit deserunt totam rem aperiam
                    unde omnis iste natus error sit.</p>
                <button class="hero-btn">Lets Begin!</button>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services" class="md-padding">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 offset-md-4">
                    <div class="section-header">
                        <h2 class="title">Services</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="services">
                        <i class="fas fa-laptop"></i>
                        <h3>Web Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio officia rem ducimus pariatur
                            assumenda iure, dolor sequi eius nam blanditiis quis.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="services">
                        <i class="fas fa-tablet-alt"></i>
                        <h3>Responsive Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio officia rem ducimus pariatur
                            assumenda iure, dolor sequi eius nam blanditiis quis.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="services">
                        <i class="fas fa-pencil-ruler"></i>
                        <h3>Graphic Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio officia rem ducimus pariatur
                            assumenda iure, dolor sequi eius nam blanditiis quis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statement Section -->
    <section id="statement" class="md-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4 class="text-black lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor<br> incididunt ut labore et dolore magna aliqua.</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="md-padding">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 offset-md-4">
                    <div class="section-header">
                        <h2 class="title">Features</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem excepturi ipsum, fugit, tenetur
                        voluptate ducimus et harum veritatis saepe, quo quod architecto possimus corporis hic nobis.</p>
                    <div class="feature">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <i class="far fa-edit"></i>
                            </div>
                            <div class="col-md-10">
                                <h5 class="text-uppercase">Home Page Design</h5>
                                <h4 class="text-uppercase">Lorem Ipsum</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, officiis? Ut, aut?
                                    Consequatur, velit officiis placeat labore suscipit adipisci delectus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="feature">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <i class="far fa-edit"></i>
                            </div>
                            <div class="col-md-10">
                                <h5 class="text-uppercase">Internal Web Pages</h5>
                                <h4 class="text-uppercase">Lorem Ipsum</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, officiis? Ut, aut?
                                    Consequatur, velit officiis placeat labore suscipit adipisci delectus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="feature">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <i class="far fa-edit"></i>
                            </div>
                            <div class="col-md-10">
                                <h5 class="text-uppercase">Backend Admin</h5>
                                <h4 class="text-uppercase">Lorem Ipsum</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, officiis? Ut, aut?
                                    Consequatur, velit officiis placeat labore suscipit adipisci delectus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 features-pad">
                    <div id="features-slide" class="owl-carousel owl-theme">
                        <img src="img/features1.jpg" class="img-fluid">
                        <img src="img/features2.jpg" class="img-fluid">
                        <img src="img/features3.jpg" class="img-fluid">
                        <img src="img/features4.jpg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
<?php include "includes/footer.php"; ?>