<?php
/**
*process-homepage.php
*EXERCISE 2 NUMBER 2 min
*FORM HANDLING
*Patrick Saint-Louis, 2023
*/

//If the form is submitted
if (isset($_POST['send'])) {
       
    //Assign to PHP variables data collected from the form   
    $itemName = $_POST["article_name"]; 
    $itemUnitPrice = $_POST["unit_price"]; 
    $itemQuantity = $_POST["article_quantity"];  
   
    //Constant declaration and assignment
    define("TPSRATE",0.05);
    define("TVQRATE",0.09975);

    //Assign the error messages related to the input fields
    $emptyMsg="Ne peut être vide!";
    
    //Validation
    //If at least 1 of the information collected via the form is incorrect 
    //Save them and redirect to the home page with error messages
    if (empty($itemName) || empty($itemUnitPrice) || empty($itemQuantity)) {
        echo "<h1> Corrigez les erreurs suivantes </h1>";
        if (empty($itemName)) 
            echo "<p>Nom de l'article $emptyMsg</p>";
        if (empty($itemUnitPrice)) 
            echo "<p>Prix unitaire de l'article $emptyMsg</p>";
        if (empty($itemQuantity)) 
            echo "<p>Quantité de l'article $emptyMsg</p>";
    }
    //If the information collected via the form is correct 
    //Redirect to the result page with the corresponding information collected and calculated
    else {
        //Calculations
        $subtotal= $itemQuantity * $itemUnitPrice;
        $tps= $subtotal * TPSRATE;
        $tvq= $subtotal * TVQRATE;
        $total= $subtotal + $tps + $tvq;

        //Keep only 2 digits as decimal values
        $itemUnitPrice=number_format($itemUnitPrice, 2, '.', '');
        $subtotal=number_format($subtotal, 2, '.', ''); 
        $tps=number_format($tps, 2, '.', ''); 
        $tvq=number_format($tvq, 2, '.', ''); 
        $total=number_format($total, 2, '.', ''); 

        //Display outputs 
        echo "<h1> Résultats d'Achat </h1>";
        echo"<h2> Article : $itemName </h2>";
        echo"<h2> Prix unitaire : $itemUnitPrice" . ' $ca</h2>';
        echo"<h2> Quantité : $itemQuantity unités</h2>";
        echo"<h2> Sous-total : $subtotal" . ' $ca</h2>';
        echo"<h2> TVQ : $tvq" . ' $ca</h2>';
        echo"<h2> TPS : $tps" . ' $ca</h2>';
        echo"<h2> Total : $total" . ' $ca</h2>';
    }  
    echo '<button class="backlink"><a href="index.html">ACCUEIL</a></button>';
}
//If you try to access this file when the form is not submitted yet
//Redirect to the Home Page
else{
    //Redirect to the result page
    header('Location: index.php'); 
}
?>

