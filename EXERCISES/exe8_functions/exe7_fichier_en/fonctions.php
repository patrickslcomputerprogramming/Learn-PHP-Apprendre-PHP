<?php

//Créer les messages à afficher
function msg(){
    //Message to display
    $message = array();
    $message['file-exist'] = "<p>The file was not created because it already exists.</p>" ;
    $message['file-created'] = "<p>The file was successfully created.</p>" ;
    $message['file-not-created'] = "<p>Something went wrong. The file cannot be created.</p>" ;
    $message['file-written'] = "<p>Data were written successfully to the file.</p>" ;
    $message['file-not-written'] = "<p>Something went wrong. The file cannot be opened to be written.</p>" ;
    $message['content-not-written'] = "<p>Something went wrong. The data cannot be written in the file.</p>" ;
    $message['file-not-written'] = "<p>The text was not written to the file because it is not empty.</p>" ;
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