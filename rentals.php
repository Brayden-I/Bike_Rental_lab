<?php

require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/functions.php';

$pdo = db();

// Fetch SQL queries for different reports
$sqlopenrentals = sqlOpenRentals();
$sqlbikerentals = sqlBikeRentals();
$sqlmorningrentals = sqlMorningRentals();

echo "<pre>$sqlbikerentals</pre>";
echo "<pre>$sqlmorningrentals</pre>";
echo "<pre>$sqlopenrentals</pre>";

$bikerentalsresult = $pdo->query($sqlbikerentals);
$morningrentalsresult = $pdo->query($sqlmorningrentals);
$openrentalsresult = $pdo->query($sqlopenrentals);
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
        <h1>Open Rentals</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $openrentalsresult->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                    <td><?= htmlspecialchars($row['model']) . "</td>"; ?></td>
                    <td><?= htmlspecialchars($row['start_time']) . "</td>"; ?></td>
                    <td><?= htmlspecialchars($row['end_time']) . "</td>"; ?></td>
                    <td><?= htmlspecialchars($row['total_cost']) . "</td>"; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <h1>Morning Rentals</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Bike Model</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $morningrentalsresult->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($rental['first_name'] . ' ' . $rental['last_name']) ?></td>
                        <td><?= htmlspecialchars($rental['model']) ?></td>
                        <td><?= htmlspecialchars($rental['start_time']) ?></td>
                        <td><?= $rental['end_time'] ? htmlspecialchars($rental['end_time']) : 'In Progress' ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h1>All Rentals</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $bikerentalsresult->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['model'])?></td>
                        <td><?= htmlspecialchars($row['start_time'])?></td>
                        <td><?= htmlspecialchars($row['end_time'])?></td>
                        <td><?= htmlspecialchars($row['total_cost'])?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
    </div>
</body>
</html>