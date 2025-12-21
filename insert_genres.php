<?php
include "connection.php";
$name = $_POST['name'];

$insert = "INSERT INTO directors (name, birth_date, nationality) VALUES ('$name')";
$query = mysqli_query($con, $insert);
if ($query) {
    echo "<br> Data berhasil disimpan <br> <a href='view_genres.php'>Lihat Data</a>";
} else {
    echo "Data gagal disimpan: " . mysqli_error($con);
}
