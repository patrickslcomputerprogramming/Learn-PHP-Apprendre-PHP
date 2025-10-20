<?php
//Declare variables
$numberOfProvinces = 10;
$numberOfTerritories = 3;
$motto = ["A mari usque ad mare (Latin)", "From Sea to Sea (English)", "De mer en mer (Français)"];
$anthem = "O Canada";
$capital = "Ottawa";
$largestCity ="Toronto";
$officialLanguages = ["English", "French"];
$governmentType = "Federal parliamentary constitutional monarchy";
$totalArea = 9984670;
$percentWaterArea = 11.76;
$population = 40528396;
$currency = 'Canadian dollar ($CA)';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canadian Provinces & Territories</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/main_post.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1 class="index-main-title">Information About the Provinces of Canada</h1>
            <div class="info-grid">
                
            </div>
        </header>
        
        <article>
            <div class="info-grid">
                <div class="quiz-game">
                    <h2> Quiz about Canada</h2>
                    <hr>
                    <p>Last puzzle: <span id="game-result-last-puzzle"></span></p>
                    <p>Last letter entered: <span id="game-result-last-letter"></span></p>
                    <p>Next puzzle: <span id="game-result-next-puzzle"></span></p>
                    <p>Result: <span id="game-result"></span></p>
                    <hr>
                    <p>Add one by one the letters missed in the name of the Canadian Province or Territory shown below.</p>

                    <input readonly id="form-masked-name" type="text" value="Q___E_">

                    <form>
                        <label>Write:
                            <input id="form-user-letter" type="text" size="1" maxlength="1" onkeyup="checkName(this.value)"> 
                        </label>
                    </form>
                </div>
                <div class="login-form"> 
                    <h2>Login to Access Information</h2>
                    <?php
                        //Refer to the current session
                        session_start();
                        //DIsplay login error message when there is
                        echo (isset($_SESSION['login-error'])) ? "<p class='error'>".$_SESSION['login-error']."</p>" : "";
                        if (isset($_SESSION['login-error'])){ 
                            unset($_SESSION['login-error']);
                        }
                    ?>
                    <!--Login form-->
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn">Login</button>
                    </form>
                </div>
            </div>
        </article>

        <footer class="layout-footer">
            <p class="footer">Patrick Saint-Louis &copy;<?php echo getdate()['year']; ?> All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
