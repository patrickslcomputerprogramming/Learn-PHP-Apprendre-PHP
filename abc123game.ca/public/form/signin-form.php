<?php

/**
 *abc123Game @2023
 *Sign-In form : connect to the game
 *Patrick Saint-Louis
 */

//Refer to the current Session if it is already started
session_start(); 

//Head section
include "../template/head.php";
//Header
//include "../template/header.php";
?>
<body>
<?php
//Header and Nav Sections
include "../template/nav.php";
?>
<div class="form-signin">
    <h1 class="h3 mb-3 fw-normal">Sign-In Form</h1>
    <hr>
    <!--Form-->

    <form id="reg-form" method="post" action="../../src/features/signin.php">

        <div class="form-floating">
            <input id=input1 class="form-control" type="text" name="uname" 
                value="<?php echo isset($_SESSION['identity']) ? $_SESSION['userUn'] : ''; ?>"
                placeholder="TheKing001">
            <label for=input1>Username</label>
        </div>

        <div class="form-floating">
            <input id=input2 class="form-control" type="password" name="pcode">
            <label for=input2>Password</label>
        </div>

        <p class="form-err-msg">
            <?php echo isset($_SESSION['identity']) ? $_SESSION['errorMsg'] : ''; ?>
        </p>

        <div class="form-floating">
            <button id="submit1" class="w-100 btn btn-lg btn-primary" type="submit" name="sender">Sign Up</button>
        </div>
    </form>
</div>
<?php
include "../template/footer.php";
?>
</body>
</html>