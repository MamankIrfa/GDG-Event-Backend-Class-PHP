<?php
include "connection.php";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

if ($keyword != '') {
    $query = mysqli_query(
        $con,
        "SELECT * FROM directors 
         WHERE name LIKE '%$keyword%'"
    );
} else {
    $query = mysqli_query($con, "SELECT * FROM directors");
}

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
        <form method="GET">
            <input type="text" name="keyword" placeholder="Cari Nama Sutradara"
                value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
            <button type="submit">Cari</button>
        </form>
        <a href=" index.php" style="padding-right: 10px;">Kembali</a>
        <a href="form_directors.php">Tambah</a>
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
                    <a href="form_directors.php?id=<?= $row['id']; ?>">Edit</a> |
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