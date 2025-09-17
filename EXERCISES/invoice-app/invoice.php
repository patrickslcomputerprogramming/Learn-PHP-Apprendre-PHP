<?php
    //Access the existing session  
    session_start();
    if (!empty($_SESSION)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invoice</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Display the invoice of the purchase</h1>
    <?php
    //Display the outputs
    echo "<p>Article Name : ". $_SESSION['article_name'] . "</p>";
    echo "<p>Unit Price : ". $_SESSION['unit_price'] . "</p>";
    echo "<p>Quantity : ". $_SESSION['quantity'] . "</p>";
    echo "<p>Subtotal : ". $_SESSION['sub_total'] . "</p>";
    echo "<p>QST Tax : ". $_SESSION['QST_tax'] . "</p>";
    echo "<p>GST Tax : ". $_SESSION['GST_tax'] . "</p>";
    echo "<p>Total : ". $_SESSION['total'] . "</p>";

    //Destroy the session and data saved 
    unset($_SESSION);
    session_destroy();   
    ?>
    <a href="index.html">BUY AGAIN</a>
</body>
</html>

<?php
} else {
    //Redirect to the purchase page
    header(header:"Location:index.html");
    exit();
}
?>