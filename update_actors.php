<?php
include "connection.php";

$id          = $_POST['id'];
$name        = $_POST['name'];
$birth_date  = $_POST['birth_date'];
$nationality = $_POST['nationality'];

$update = "UPDATE actors
    SET
        name = '$name',
        birth_date = '$birth_date',
        nationality = '$nationality'
    WHERE id = $id
";

$query = mysqli_query($con, $update);

if ($query) {
    echo "<br> Data berhasil diubah <br> <a href='view_actors.php'>Lihat Data</a>";
} else {
    echo "Update gagal: " . mysqli_error($con);
}
