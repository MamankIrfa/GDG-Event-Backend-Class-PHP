<?php
include "connection.php";
$isEdit = false;
$data = [
    'id' => '',
    'name' => '',
];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($con, "SELECT * FROM genres WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    $isEdit = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Edit Sutradara' : 'Input Sutradara'; ?></title>
</head>

<body>
    <form
        action="<?= $isEdit ? 'update_genres.php?id=' . $data['id'] : 'insert_genres.php'; ?>"
        method="post">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <?php endif; ?>

        <center>
            <h3><?= $isEdit ? 'FORM GENRE FILM' : 'FORM INPUT GENRE FILM'; ?></h3>
        </center>

        <table border="1" align="center">
            <tr>
                <td>Genre Film</td>
                <td>
                    <input
                        type="text"
                        name="name"
                        value="<?= $data['name']; ?>"
                        required>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input
                        type="submit"
                        value="<?= $isEdit ? 'Update' : 'Simpan'; ?>">
                    <a href="view_genres.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>