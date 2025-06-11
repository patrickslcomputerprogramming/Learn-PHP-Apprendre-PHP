<?php

//Créer les messages à afficher
function msg(){
    //Message to display
    $message = array();
    $message['file-exist'] = "<p>Le fichier n'est pas créé car il existe déjà.</p>" ;
    $message['file-created'] = "<p>Le fichier a été créé avec succès.</p>" ;
    $message['file-not-created'] = "<p>Problème détecté. Le fichier ne peut pas être créé.</p>" ;
    $message['file-written'] = "<p>Le fichier a été écrit avec succès.</p>" ;
    $message['file-not-written'] = "<p>Problème détecté. Le fichier ne peut pas être ouvert pour l'écriture du texte.</p>" ;
    $message['content-not-written'] = "<p>Problème détecté. Le texte ne peut pas être écrit dans le fichier.</p>" ;
    $message['file-not-written'] = "<p>Le texte n'a pas été ajouté au fichier car il existe déjà.</p>" ;
    return $message;
}


//Créer un fichier s'il n'exite pas déjà
function creerUnFichier($fileNameLocation, $message){
    //Vérifier si le fichier existe
    if (file_exists($fileNameLocation) === TRUE)
        echo $message['file-exist'];
    else {
        //Créer le fichier
        $open_cmd = fopen($fileNameLocation, 'w') 
                    or die($message['file-not-created']);
        fclose(fopen($fileNameLocation, 'w'));
        echo $message['file-created'];   
    }
}

//Ajouter des données dans un fichier
function ajouterDonnéesDansUnFichier($fileNameLocation, $data, $message){
    //Write data to the file when it is empty
    $existing_content = file_get_contents($fileNameLocation);
    if ($existing_content == '') {
        //2.1-Open the file for writing using fopen()-The next times it opens it  
        $open_cmd = fopen($fileNameLocation, 'w') 
                    or die($message['file-not-written'] );
        fwrite($open_cmd, $data) 
                    or die($message['content-not-written']);
        fclose($open_cmd);
        echo $message['file-written'];
    } else {
        echo $message['file-not-written'];
    }
}