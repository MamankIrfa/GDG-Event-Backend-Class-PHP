<?php
include "connection.php";
$name = $_POST['name'];
$birth = $_POST['birth_date'];
$nationality = $_POST['nationality'];

$insert = "INSERT INTO actors (name, birth_date, nationality) VALUES ('$name', '$birth', '$nationality')";
$query = mysqli_query($con, $insert);
if ($query) {
    echo "<br> Data berhasil disimpan <br> <a href='view_actors.php'>Lihat Data</a>";
} else {
    echo "Data gagal disimpan: " . mysqli_error($con);
}
