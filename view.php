<?php
include "connection.php";
echo "<table border='1' align='center'>
            <tr>
                <th>Judul</th>
                <th>Sutradara</th>
                <th>Aktor</th>
                <th>Peran</th>
                <th>...</th>
            </tr>";

$query = "
    SELECT
        ma.id,
        d.name AS director,
        m.title,
        a.name AS actor,
        ma.role_name
    FROM movie_actors ma
    JOIN movies m ON ma.movie_id = m.id
    JOIN actors a ON ma.actor_id = a.id
    JOIN directors d ON m.director_id = d.id
    ";
$sql = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($sql)) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['director'] . "</td>";
    echo "<td>" . $row['actor'] . "</td>";
    echo "<td>" . $row['role_name'] . "</td>";
    echo "<td>
        <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
        <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
    </td>";
    echo "</tr>";
}
echo "</table>";
