<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Movie Watchlist</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🎬 Movie Watchlist</h1>

    <?php
    $sql = "SELECT * FROM movies ORDER BY release_year DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='movies'>";
        while($row = $result->fetch_assoc()) {
            echo "<div class='movie'>";
            echo "<h2>" . htmlspecialchars($row["title"]) . " (" . $row["release_year"] . ")</h2>";
            echo "<p><strong>Director:</strong> " . htmlspecialchars($row["director"]) . "</p>";
            echo "<p><strong>Genre:</strong> " . htmlspecialchars($row["genre"]) . "</p>";
            echo "<p><strong>Rating:</strong> " . $row["rating"] . "/10</p>";
            echo "<p><strong>Streaming:</strong> " . htmlspecialchars($row["platform"]) . "</p>";

            // If/Else Example
            if ($row["rating"] >= 9.0) {
                echo "<p class='top-rated'>⭐ Masterpiece</p>";
            } elseif ($row["rating"] >= 8.5) {
                echo "<p class='great'>🎯 Must Watch</p>";
            } else {
                echo "<p class='decent'>🎬 Worth a Look</p>";
            }

            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No movies found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
