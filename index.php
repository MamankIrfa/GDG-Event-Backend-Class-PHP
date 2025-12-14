<?php
include "connection.php";
$cinema = "SELECT
    m.id,
    m.title,
    m.synopsis,
    m.duration_minutes AS duration,
    m.release_date,
    d.name AS director,

    GROUP_CONCAT(DISTINCT g.name SEPARATOR ', ') AS genre,
    GROUP_CONCAT(DISTINCT CONCAT(a.name, ' (', ma.role_name, ')') SEPARATOR ', ') AS actors

FROM movies m
JOIN directors d ON m.director_id = d.id
LEFT JOIN movie_genres mg ON m.id = mg.movie_id
LEFT JOIN genres g ON mg.genre_id = g.id
LEFT JOIN movie_actors ma ON m.id = ma.movie_id
LEFT JOIN actors a ON ma.actor_id = a.id

GROUP BY m.id";
$query = mysqli_query($con, $cinema);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lihat Data Film</title>
</head>

<body>

    <center>
        <h3>Lihat Data Film</h3>
        <br />
        <a href="view_directors.php">Lihat Data Sutradara</a>
        <br />
        <a href="view_actors.php">Lihat Data Aktor</a>
    </center>

    <br>

    <table border="1" align="center" cellpadding="5">
        <tr>
            <th>Judul</th>
            <th>Sinopsis</th>
            <th>Genre</th>
            <th>Durasi (menit)</th>
            <th>Tanggal Rilis</th>
            <th>Sutradara</th>
            <th>Aktor</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($query)):  ?>
            <tr>
                <td><?= $row['title']; ?></td>
                <td><?= $row['synopsis']; ?></td>
                <td><?= $row['genre']; ?></td>
                <td><?= $row['duration']; ?> menit</td>
                <td><?= $row['release_date']; ?></td>
                <td><?= $row['director']; ?></td>
                <td><?= $row['actors']; ?></td>
            </tr>
        <?php endwhile; ?>

    </table>

</body>

</html>