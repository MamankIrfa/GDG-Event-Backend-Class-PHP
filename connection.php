<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cinema_db";
$con = mysqli_connect($host, $user, $pass, $db);
if ($con) {
    echo "Connected successfully";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
