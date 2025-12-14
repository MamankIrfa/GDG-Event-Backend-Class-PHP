<?php
include "connection.php";
$id = $_GET['id'];

$delete = "DELETE FROM actors WHERE id = $id";
$query = mysqli_query($con, $delete);
if ($query) {
    echo "<br> Data berhasil dihapus <br> <a href='view_actors.php'>Lihat Data</a>";
}
