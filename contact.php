<?php $page = 'contact';
include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["send_mail"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    require_once "PHPMailer\PHPMailer.php";
    require_once "PHPMailer\SMTP.php";
    require_once "PHPMailer\Exception.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "youremail@gmail.com";
    $mail->Password = 'yourpassword';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("youremail@gmail.com");
    $mail->Subject = ("$email (PhpBlog Contact Form)");
    $mail->Body = "Name: " . $name . "<br>Phone Number: " . $phone . "<br>Message: " . $message;

    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }
    header("Location: contact.php");
}


?>

    <!-- Inside Hero Section -->
    <section class="page-image page-image-contact md-padding">
        <h1 class="text-white text-center">CONTACT</h1>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" class="md-padding">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 offset-md-4">
                    <div class="section-header">
                        <h2 class="title">Contact</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" id="contactForm" name="sendMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Your Name *"
                                           required="required"
                                           data-validation-required-message="Please enter your name!">
                                    <p class="text-danger help-block"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" type="email"
                                           placeholder="Your Email *"
                                           required="required"
                                           data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="phone" type="tel"
                                           placeholder="Your Phone *"
                                           required="required"
                                           data-validation-required-message="Please enter your phone.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea id="message" class="form-control" name="message"
                                              placeholder="Your Message *"
                                              required="required"
                                              data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="hero-btn" name="send_mail" id="sendMessageButton">Send
                                    Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer Section -->
<?php include "includes/footer.php"; ?>