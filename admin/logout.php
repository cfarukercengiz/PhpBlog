<?php session_start(); ?>
<?php

$_SESSION["username"] = null;
$_SESSION["password"] = null;
$_SESSION["email"] = null;
$_SESSION["role"] = null;

header("Location: login.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PhpBlog - Login</title>

    <!-- Custom fonts for this template-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/styles.css" rel="stylesheet"/>

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5 col-md-6">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="inputUsername" name="username" class="form-control"
                               placeholder="Username" required="required" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" name="password" class="form-control"
                               placeholder="Password" required="required">
                    </div>
                </div>
                <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>

</body>

</html>