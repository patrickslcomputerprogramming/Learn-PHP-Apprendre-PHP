<?php
session_start();
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: index.php');
    exit();
}

require_once 'Calculate.php';

$data = new Calculate;
$sortedByNameAsc = $data -> getACalculateData(field: "name", operation: "ascending");
$sortedByPopulationDesc = $data -> getACalculateData(field: "population", operation: "descending");
$largestArea = $data -> getACalculateData(field: "totalArea", operation: "greatest");
$smallestArea = $data -> getACalculateData(field: "totalArea", operation: "lowest");
$longestMotto = $data -> getACalculateData(field: "motto", operation: "greatest");
$shortestMotto = $data -> getACalculateData(field: "motto", operation: "lowest");
$confederationDate = $data -> getACalculateData(field: "confederationDate", operation: "ascending");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Provinces & Territories - Calculated Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>All Provinces and Territories - Calculated Data</h1>
            <div class="user-info">
                Thank you for your interest in Canada <?php echo $_SESSION['username']; ?>! 
                <a href="logout.php" class="btn logout">Logout</a>
            </div>
        </header>

        <div class="calculations">
            <div class="calculation-section">
                <h2>Provinces and Territories Sorted by Name (A-Z)</h2>
                <div class="sorted-list">
                    <?php foreach ($sortedByNameAsc as $key => $value): ?>
                        <div class="list-item"><?php echo $value; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="calculation-section">
                <h2>Provinces and Territories Sorted by Population (Highest to Lowest)</h2>
                <div class="sorted-list">
                    <?php foreach ($sortedByPopulationDesc as $key => $value): ?>
                        <div class="list-item">
                            <?php echo $key; ?>: <?php echo number_format($value); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="calculation-section">
                <h2>Provinces and Territories Sorted by Confederation Date (Oldest to Newest)</h2>
                <div class="sorted-list">
                    <?php foreach ($confederationDate as $key => $value): ?>
                        <div class="list-item">
                            <?php echo $key; ?>: <?php echo $value; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="calculation-section highlights">
                <h2>Key Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-item">
                        <h3>Largest by Area</h3>
                        <?php foreach ($largestArea as $key => $value): ?>
                            <div class="list-item">
                                <p class="display-outputs"><?php echo $key; ?>: <?php echo "<span class='label'>".$value." km²</span>"; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="stat-item">
                        <h3>Smallest by Area</h3>
                        <?php foreach ($smallestArea as $key => $value): ?>
                            <div class="list-item">
                                <p class="display-outputs"><?php echo $key; ?>: <?php echo "<span class='label'>".$value." km²</span>"; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="stat-item">
                        <h3>Longest Motto</h3>
                        <?php foreach ($longestMotto as $key => $value): ?>
                            <div class="list-item">
                                <p class="display-outputs"><?php echo $key; ?>: <?php echo "<span class='label'>".$value."</span>"; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="stat-item">
                        <h3>Shortest Motto</h3>
                        <?php foreach ($shortestMotto as $key => $value): ?>
                            <div class="list-item">
                                <p class="display-outputs"><?php echo $key; ?>: <?php echo "<span class='label'>".$value."</span>"; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="canada-info.php" class="btn">Search Another Province</a>
        </div>
    </div>
</body>
</html>