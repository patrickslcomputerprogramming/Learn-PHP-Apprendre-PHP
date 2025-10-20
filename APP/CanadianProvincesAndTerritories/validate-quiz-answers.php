<?php

//Si la requête AJAX n’est pas envoyée, donc la variable $_POST ou $_GET n’est pas créée 
if (!isset($_POST["form_data"])) {
    //Rediriger vers la page d'accueil (formulaire)
    header(header: "Location: index.php");
    exit();
}
//Si la requête AJAX est envoyée, donc la variable $_POST ou $_GET est créée 
else {
    include_once "functions.php";
    //Province and Territories names
    $provinceName = getProvinceName();
    //Enregistrer les données reçues de la requête AJAX 
    $form_data = explode(separator: ",", string: $_POST["form_data"]);
    $maskedName = $form_data[0];
    $userLetter = $form_data[1];

    //Calculate the corresponding secret name
    $secretName = null;
    foreach ($provinceName as $key => $value) {
        if (strlen(string: $value) == strlen(string: $maskedName)) {
            if ($value != "ALBERTA" && $value != "NUNAVUT" && $value != "ONTARIO") {
                $secretName = $value;
                break;
            } else {
                $possibleName = array("ALBERTA", "NUNAVUT", "ONTARIO");
                foreach ($possibleName as $possibleKey => $possibleValue) {
                    $match = 0;
                    for ($i = 0; $i < strlen(string: $possibleValue); $i++) {
                        if ($possibleValue[$i] === $maskedName[$i]) {
                            $match++;
                        }
                        if ($match >= 2) {
                            $secretName = $possibleValue;
                            break;
                        }
                    }
                    echo "<p>match = " . $match . "</p>";
                    if ($match >= 2) {
                        break;
                    }
                }
            }
            if ($secretName) {
                break;
            }
        }
    }

    //Calculate the whether the user letter matched or not
    $nextMaskedName = $maskedName;
    $match = 0;
    for ($i = 0; $i < strlen(string: $secretName); $i++) {
        if ($secretName[$i] === $userLetter) {
            $nextMaskedName[$i] = $userLetter;
            $match++;
        }
    }

    //Calculate the result message
    if ($match === 0) {
        $resultMessage = "Wrong answer. You didn't find the masked name! Try again!";
        $newMaskedName = getMaskedName();
    } else if ($match > 0 && str_contains(haystack: $nextMaskedName, needle: "_")) {
        $resultMessage = "Good answer. Continue to guessed the masked name!";
        $newMaskedName = $nextMaskedName;
    } else {
        $resultMessage = "Congratulations. You found the masked name!";
        $newMaskedName = getMaskedName();
    }

    //Send outpout
    echo $nextMaskedName . "," . $newMaskedName . "," . $resultMessage;
}
