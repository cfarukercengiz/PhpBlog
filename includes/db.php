<?php

$db_host = "127.0.0.1";
$db_user = "root";
$db_password = "root";
$db_name = "phpcms_db";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
$conn->set_charset("utf8");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>