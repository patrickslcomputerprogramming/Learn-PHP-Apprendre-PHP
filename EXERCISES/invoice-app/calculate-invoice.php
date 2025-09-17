<?php
if (isset($_POST['submit-button'])) {
    //Define the variables
    define("QST_TAX_RATE", 9.975/100);
    define("GST_TAX_RATE", 5/100);
    
    //Save the data collected from the form 
    $article = $_POST['article'];
    $unit_price = $_POST['unitprice'];
    $quantity = $_POST['quantity'];

    //Calculate
    $sub_total = $unit_price * $quantity;
    $QST_tax = $sub_total * QST_TAX_RATE;
    $GST_tax = $sub_total * GST_TAX_RATE;
    $total = $sub_total + $QST_tax + $GST_tax;

    //Start a new session and save data to make them accessible in the output page 
    session_start();
    $_SESSION['article_name'] = $article;
    $_SESSION['unit_price'] = $unit_price;
    $_SESSION['quantity'] = $quantity;
    $_SESSION['sub_total'] = $sub_total;
    $_SESSION['QST_tax'] = $QST_tax;
    $_SESSION['GST_tax'] = $GST_tax;
    $_SESSION['total'] = $total;

    //Redirect to the output page
    header(header:"Location:invoice.php");
} else {
    //Redirect to the purchase page
    header(header:"Location:index.html");
    exit();
}


