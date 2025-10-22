<?php

require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/functions.php';

$pdo = db();

$sql = sqlTop3Bikes();
echo "<pre>$sql</pre>";

$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    // Include Bootstrap CSS
    require __DIR__ . '/includes/bootstrapcdnlinks.php';
    ?>
</head>
<body>
    <?php
    // Include navigation bar
    require __DIR__ . '/includes/nav.php';
    ?>

    <div class="container">
        <h1>Top 3 Rented Bikes</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Bike ID</th>
                    <th>Model</th>
                    <th>Rental Count</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['bike_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['rental_count']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>