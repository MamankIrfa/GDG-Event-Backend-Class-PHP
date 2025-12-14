<?php
include "connection.php";
$query = mysqli_query($con, "SELECT * FROM directors");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Data Sutradara</title>
</head>

<body>

    <center>
        <h3>Lihat Data Sutradara</h3>
        <a href="form_director.php">Tambah</a>
    </center>

    <br>

    <table border="1" align="center" cellpadding="5">
        <tr>
            <th>Sutradara</th>
            <th>Tanggal Lahir</th>
            <th>Bangsa</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['birth_date']; ?></td>
                <td><?= $row['nationality']; ?></td>
                <td>
                    <a href="form_director.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a
                        href="delete_directors.php?id=<?= $row['id']; ?>"
                        onclick="return confirm('Are you sure?')">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>

    </table>

</body>

</html>