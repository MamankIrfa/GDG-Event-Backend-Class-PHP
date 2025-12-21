<?php
include "connection.php";

$id          = $_POST['id'];
$name        = $_POST['name'];

$update = "UPDATE genres
    SET
        name = '$name',
    WHERE id = $id
";

$query = mysqli_query($con, $update);

if ($query) {
    echo "<br> Data berhasil diubah <br> <a href='view_genres.php'>Lihat Data</a>";
} else {
    echo "Update gagal: " . mysqli_error($con);
}
