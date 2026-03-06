<?php
//Convertir Warnings en Exceptions
set_error_handler(callback: function ($severity, $message, $file, $line) {
    throw new ErrorException(
        message: $message,
        code: 0,
        severity: $severity,
        filename: $file,
        line: $line
    );
});


//Créer les messages à afficher
function msg(): array
{
    //Message to display
    $message = array();
    $message['file-exist'] = "Le fichier n'est pas créé car il existe déjà.";
    $message['file-created'] = "Le fichier a été créé avec succès.";
    $message['file-not-created'] = "Problème détecté. Le fichier ne peut pas être créé.";
    $message['file-written'] = "Le fichier a été écrit avec succès.";
    $message['file-not-written'] = "Problème détecté. Le fichier ne peut pas être ouvert pour l'écriture du texte.";
    $message['content-not-written'] = "Problème détecté. Le texte ne peut pas être écrit dans le fichier.";
    $message['content-exist'] = "Le texte n'a pas été ajouté au fichier parce qu'il n'est pas vide mais contient déjà un contenu.";
    return $message;
}


//Fonction pour créer un nouveau fichier 
function creerUnFichier($fileNameLocation, $message): string
{
    if (file_exists(filename: $fileNameLocation) === TRUE)
        //Si le fichier existe, indiquez-le
        $sortie = $message['file-exist'];
    else {
        //Si le fichier n'existe pas, créez-le
        try {
            //Créer le fichier
            fopen(filename: $fileNameLocation, mode: 'w');
            //Fermer le fichier
            fclose(stream: fopen(filename: $fileNameLocation, mode: 'w'));
            $sortie = $message['file-created'];
        } catch (ErrorException $e) {
            //Afficher les warnings transformés en exceptions s'il y en a
            $sortie = $message['file-not-created'] . "<br/>";
            $sortie = $sortie . "Message erreur : " . $e->getMessage() . "<br/>";
            $sortie = $sortie . "Fichier erreur : " . $e->getFile() . "<br/>";
            $sortie = $sortie . "Ligne   erreur : " . $e->getLine();
        }
    }
    //Envoyer sortie
    return $sortie;
}

//Fonction pour ajouter du contenu dans un fichier 
function ajouterDonnéesDansUnFichier($fileNameLocation, $data, $message): string
{
    //Sauvegarder le contenu du fichier
    $existing_content = file_get_contents(filename: $fileNameLocation);
    if ($existing_content == '') {
        //Si le fichier n'a pas encore de contenu, créez-le   
        try {
            //Ouvrir le fichier en mode lecture
            $open_cmd = fopen(filename: $fileNameLocation, mode: 'w');
            try {
                //Ajouter le contenu dans le fichier
                fwrite(stream: $open_cmd, data: $data);
                $sortie = $message['file-written'];
            } catch (ErrorException $e) {
                //Afficher les warnings transformés en exceptions s'il y en a
                $sortie = $message['content-not-written'] . "<br/>";
                $sortie = $sortie . "Message erreur : " . $e->getMessage() . "<br/>";
                $sortie = $sortie . "Fichier erreur : " . $e->getFile() . "<br/>";
                $sortie = $sortie . "Ligne   erreur : " . $e->getLine();
            } finally {
                //Fermer le fichier
                fclose($open_cmd);
            }
        } catch (ErrorException $e) {
            //Afficher les warnings transformés en exceptions s'il y en a
            $sortie = $message['file-not-written'] . "<br/>";
            $sortie = $sortie . "Message erreur : " . $e->getMessage() . "<br/>";
            $sortie = $sortie . "Fichier erreur : " . $e->getFile() . "<br/>";
            $sortie = $sortie . "Ligne   erreur : " . $e->getLine();
        }
    } else {
        //Si le fichier a déjà du contenu, indiquez-le 
        $sortie = $message['content-exist'];
    }
    //Envoyer sortie
    return $sortie;
}
