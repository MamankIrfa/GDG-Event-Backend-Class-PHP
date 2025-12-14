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
    $query = mysqli_query($con, "SELECT * FROM actors WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    $isEdit = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Edit Actor' : 'Input Actor'; ?></title>
</head>

<body>
    <form
        action="<?= $isEdit ? 'update_actors.php?id=' . $data['id'] : 'insert_actors.php'; ?>"
        method="post">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <?php endif; ?>

        <center>
            <h3><?= $isEdit ? 'FORM EDIT AKTOR' : 'FORM INPUT AKTOR'; ?></h3>
        </center>

        <table border="1" align="center">
            <tr>
                <td>Aktor</td>
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
                    <a href="view_actors.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>