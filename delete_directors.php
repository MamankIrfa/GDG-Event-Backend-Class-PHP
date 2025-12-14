<?php
include "connection.php";
$id = $_GET['id'];

$delete = "DELETE FROM directors WHERE id = $id";
$query = mysqli_query($con, $delete);
if ($query) {
    echo "<br> Data berhasil dihapus <br> <a href='view_directors.php'>Lihat Data</a>";
}