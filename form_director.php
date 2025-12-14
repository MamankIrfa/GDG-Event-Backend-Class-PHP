<?php
include "connection.php";
$isEdit = false;
$data = [
    'id' => '',
    'name' => '',
    'birth_date' => '',
    'nationality' => ''
];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($con, "SELECT * FROM directors WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    $isEdit = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Edit Director' : 'Input Director'; ?></title>
</head>

<body>
    <!-- 'form_director.php?id=" . $row['id'] . "' -->
    <form
        action="<?= $isEdit ? 'update_directors.php?id=' . $data['id'] : 'insert_directors.php'; ?>"
        method="post">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <?php endif; ?>

        <center>
            <h3><?= $isEdit ? 'FORM EDIT DIRECTOR' : 'FORM INPUT DIRECTOR'; ?></h3>
        </center>

        <table border="1" align="center">
            <tr>
                <td>Sutradara</td>
                <td>
                    <input
                        type="text"
                        name="name"
                        value="<?= $data['name']; ?>"
                        required>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>
                    <input
                        type="date"
                        name="birth_date"
                        value="<?= $data['birth_date']; ?>">
                </td>
            </tr>
            <tr>
                <td>Bangsa</td>
                <td>
                    <input
                        type="text"
                        name="nationality"
                        value="<?= $data['nationality']; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input
                        type="submit"
                        value="<?= $isEdit ? 'Update' : 'Simpan'; ?>">
                    <a href="index.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>