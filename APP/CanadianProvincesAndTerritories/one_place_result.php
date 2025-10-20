<?php
session_start();
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: index.pha');
    exit();
}

require_once 'Calculate.php';

#$selectedProvince = $_POST['province'] ?? '';
$selectedProvince = $_GET['name'] ?? '';
$provinceData = new Symbols(name: $selectedProvince) ?? null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $selectedProvince; ?> - Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1><?php echo $selectedProvince; ?> - Province Information</h1>
            <div class="user-info">
                Thank you for your interest in Canada <?php echo $_SESSION['username']; ?>! 
                <a href="logout.php" class="btn logout">Logout</a>
            </div>
        </header>

        <?php 
            if ($provinceData): 
                $identification_data = $provinceData->getIdentificationData();
                $characteristics_data = $provinceData->getCharacteristicsData();
                $symbols_data = $provinceData->getSymbolsData();
        ?>
        <div class="province-info">
            <div class="info-grid">
                <div class="basic-info">
                    <h2>Identification|Identification</h2>
                    <p class="display-outputs"><strong>Postal Abbreviation|Abbréviation postale:</strong><span class="label"> <?php echo $identification_data['postalAbbreviation']; ?></span></p>
                    <p class="display-outputs"><strong>Coordinates|Coordonnées:</strong><span class="label"> <?php echo $identification_data['coordinates']; ?></span></p>
                    <p class="display-outputs"><strong>Entered Date in the Confederation|Date d'entrée dans la Confédération:</strong><span class="label"> <?php echo $identification_data['confederationDate']; ?></span></p>
                </div>
                
                <div class="characteristics">
                    <h2>Characteristics|Caractéristiques</h2>
                    <p class="display-outputs"><strong>Capital|Capitale:</strong><span class="label"> <?php echo $characteristics_data['capital']; ?></span></p>
                    <p class="display-outputs"><strong>Largest City|Plus grande ville:</strong><span class="label"> <?php echo $characteristics_data['largestCity']; ?></span></p>
                    <p class="display-outputs"><strong>Official Language|Langues officielles:</strong><span class="label"> <?php echo implode(separator: ', ', array: $characteristics_data['officialLanguages']); ?></span></p>
                    <p class="display-outputs"><strong>Time Zone|Fuseau horaire:</strong><span class="label"> <?php echo $characteristics_data['timeZone']; ?></span></p>
                    <p class="display-outputs"><strong>Total Area|Superficie totale:</strong><span class="label"> <?php echo number_format(num: $characteristics_data['totalArea']); ?> km²</span></p>
                    <p class="display-outputs"><strong>Land Area|Superficie terreste:</strong><span class="label"> <?php echo number_format(num: $characteristics_data['landArea']); ?> km²</span></p>
                    <p class="display-outputs"><strong>Water Area|Superficie en eau:</strong><span class="label"> <?php echo number_format(num: $characteristics_data['waterArea']); ?> km²</span></p>
                    <p class="display-outputs"><strong>Population|Population:</strong><span class="label"> <?php echo number_format(num: $characteristics_data['population']); ?></span></p>
                </div>
                
                <div class="symbols">
                    <h2>Symbols|Symboles</h2>
                    <p class="display-outputs"><strong>Motto|Slogan:</strong><span class="label"> <?php echo $symbols_data['motto']; ?></span></p>
                    <div class="images">
                        <div class="image-item">
                            <strong>Flag|Drapeau:</strong><br>
                            <img src="<?php echo $symbols_data['flagImage']; ?>" alt="<?php echo $selectedProvince; ?> Flag">
                        </div>
                        <div class="image-item">
                            <strong>Coat of Arms|Armoiries:</strong><br>
                            <img src="<?php echo $symbols_data['coatOfArmsImage']; ?>" alt="<?php echo $selectedProvince; ?> Coat of Arms">
                        </div>
                        <div class="image-item">
                            <strong>Geographic Map|Carte géographique:</strong><br>
                            <img src="<?php echo $symbols_data['geographicImage']; ?>" alt="<?php echo $selectedProvince; ?> Map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <p class="error">Province data not found.|Données non trouvées pour la Province.</p>
        <?php endif; ?>

        <div class="action-buttons">
            <a href="canada-info.php" class="btn">Search Another Province</a>
            <a href="all_places_result.php" class="btn">View All Provinces Data</a>
        </div>
    </div>
</body>
</html>