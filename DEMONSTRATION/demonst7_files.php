<?php
/* ******************************************* */
//1-Tester si un dossier ou un fichier existe avec file_exists()
/* ******************************************* */  
$folderNameLocation="C:/wamp64/www/dw3";
//1.1-Dossier
$dossier=file_exists($folderNameLocation);

if ($dossier===TRUE) 
    echo "Ce Dossier existe<br/>";
else
    echo "Ce Dossier n'existe pas<br/>";

//1.1-Fichier
$fileNameLocation="C:/wamp64/www/dw3/exercises/exercise11/exercise11abc.php";

$fichier=file_exists($fileNameLocation);

if ($fichier===TRUE) 
    echo "Ce Fichier existe<br/>";
else
    echo "Ce Fichier n'existe pas<br/>";

/* ******************************************* */
//2-Créer un fichier avec fopen()
/* ******************************************* */

//Nom et location du fichier  

$file_name_location="C:/wamp64/www/dw3/nouveaudossier/index.txt";

//2.1-Créer le fichier
$creation_cmd = fopen($file_name_location, 'w');
fclose($creation_cmd);

$file_name_location="C:/wamp64/www/dw3/nouveaudossier/index.txt";

//Content to add to the file
$file_content = <<<_END
//Source Wikipedia
    PHP: Hypertext Preprocessor, 
    plus connu sous son sigle PHP (sigle auto-référentiel), 
    est un langage de programmation libre, 
    principalement utilisé pour produire 
    des pages Web dynamiques via un serveur HTTP, 
    mais pouvant également fonctionner comme n'importe 
    quel langage interprété de façon locale. 
    PHP est un langage impératif orienté objet.;
_END;

//2.1-Ouvrir le fichier  
$open_cmd = fopen($file_name_location, 'w');

//2.2-Ajouter le contenu 
fwrite($open_cmd, $file_content);
fclose($open_cmd);



/* *********************************************************************** */
//3-Lire un fichier avec fgets(), fread(), and file_get_contents()
/* *********************************************************************** */


$file_name_location="C:/wamp64/www/dw3/nouveaudossier/index.txt";

//Ouvrir le fichier   
$open_cmd = fopen($file_name_location, 'r');

//3.1-Lire le fichier
//Enregistrer le contenu de la 1e ligne
$first_line = fgets($open_cmd);
//Fermer le fichier
fclose($open_cmd);
//Afficher le contenu enregistré
echo "$first_line <br/>";

$open_cmd = fopen($file_name_location, 'r');
//3.2-Enregistrer les 50 premiers charactères
$selected_characters = fread($open_cmd, 50);
fclose($open_cmd);
echo "$selected_characters <br/>";

//3.3-Enregistrer tout le contenu
$whole_content = file_get_contents($file_name_location);
echo "$whole_content <br/>";


/* ******************************************* */
//4-Copier un fichier avec copy()
/* ******************************************* */

//Nom et location du fichier 
$file_name_location="C:/wamp64/www/dw3/nouveaudossier/index.txt";

//Nom et location du fichier qui sera copié
$copied_file_name_location="C:/wamp64/www/dw3/nouveaudossier/index.php";

//Copier le fichier
copy($file_name_location, $copied_file_name_location);


/* ******************************************* */
//5-Renommer un fichier avec rename()
/* ******************************************* */

//Nom et location du fichier 
$copied_file_name_location="C:/wamp64/www/dw3/nouveaudossier/index.php";

//Nom et location du fichier renommé
$renamed_file_name_location="C:/wamp64/www/dw3/nouveaudossier/index2.txt";

//Renommer le fichier
rename($copied_file_name_location, $renamed_file_name_location);


/* ******************************************* */
//6-Supprimer un fichier avec unlink()
/* ******************************************* */

//Nom et location du fichier 1
$file_name_location="C:/wamp64/www/dw3/nouveaudossier/index.txt";

//Nom et location du fichier 2
$renamed_file_name_location="C:/wamp64/www/dw3/nouveaudossier/index2.txt";

//Supprimer
unlink($file_name_location);
unlink($renamed_file_name_location);

/* ******************************************* */
//7-Variable Superglobale $_FILES
/* ******************************************* */
/* Les informations ci-dessous sont enregistréss pour tout fichier téléversé dans $_FILES.
$_FILES['file']['name'] The name of the uploaded file, including the extension (e.g., readme.txt)
$_FILES['file']['type'] The content type of the file (e.g., image/png, text/html, text/css)
$_FILES['file']['size'] The file’s size in bytes (e.g. 1,150 bytes)
$_FILES['file']['tmp_name'] The name of the temporary file stored on the server
$_FILES['file']['error'] The error code resulting from the file upload, when applicable
*/



//ENGLISH ****************************************************************************
<?php

/* ******************************************* */
//1-Checking Whether a Folder or a File exists using file_exists()
/* ******************************************* */
$folderNameLocation="C:/wamp64/www/dw3";
//1.1-Folder
if (file_exists($folderNameLocation===TRUE)) 
    echo "Directory exists<br/>";
else
    echo "Directory doesn't exist<br/>";

$fileNameLocation="C:/wamp64/www/dw3/exercises/exercise11/exercise11a.php";
//1.2-File
$checkFileExists=file_exists($fileNameLocation);
if ($checkFileExists===TRUE) 
    echo "File exists<br/>";
else
    echo "File doesn't exist<br/>";

var_dump($checkFileExists);

/* ******************************************* */
//2-Creating a File using fopen()
/* ******************************************* */

//File name and location
$file_name_location="C:/wamp64/www/dw3/newfolder/index.txt";

//2.1-Create the file using fopen()-The first time it creates and open it
$creation_cmd = fopen($file_name_location, 'w');
fclose($creation_cmd);


//Content to add to the file
$file_content = <<<_END
    //Content of my file
    echo"Welcome to my first file!<br/>";
    echo"I created it via my PHP script<br/>";
_END;

//2.1-Open the file for writing using fopen()-The next times it opens it  
$open_cmd = fopen($file_name_location, 'w');

//2.2-Add content to the file using fwrite() and fclose()
fwrite($open_cmd, $file_content);
fclose($open_cmd);
      
//2.3-fopen Modes
//Check all the modes in https://www.php.net/manual/en/function.fopen.php
/*'r'  Open for reading only; place the file pointer at the beginning of the file. Return FALSE if the file doesn’t already exist.
  'r+' Open for reading and writing; place the file pointer at the beginning of the file. Return FALSE if the file doesn’t already exist.
  'w'  Open for writing only; place the file pointer at the beginning of the file and truncate the file to zero length. If the file doesn’t exist, attempt to create it.
  'w+' Open for reading and writing; place the file pointer at the beginning of the file and truncate the file to zero length. If the file doesn’t exist, attempt to create it.
  'a'  Open for writing only; place the file pointer at the end of the file. If the file doesn’t exist, attempt to create it.
  'a+' Open for reading and writing; place the file pointer at the end of the file. If the file doesn’t exist, attempt to create it. */

/* *********************************************************************** */
//3-Reading from a File using fgets(), fread(), and file_get_contents()
/* *********************************************************************** */


$file_name_location="C:/wamp64/www/dw3/newfolder/index.txt";
//Open the file for reading using fopen()-The next times it opens it  
$open_cmd = fopen($file_name_location, 'r');

//3.1-Get the 1st line of the file
//Save the content of the 1st line of the file
$first_line = fgets($open_cmd);
//Close the file
fclose($open_cmd);
//Display the content found
echo "$first_line <br/>";

$open_cmd = fopen($file_name_location, 'r');
//3.2-Get the 50 first characters of the file
$selected_characters = fread($open_cmd, 15);
fclose($open_cmd);
echo "$selected_characters <br/>";

//3.3-Get the whole content of the file
$whole_content = file_get_contents($file_name_location);
echo "$whole_content <br/>";

/* ******************************************* */
//4-Copying a File using copy()
/* ******************************************* */
//File name and location of existing file
$file_name_location="C:/wamp64/www/dw3/newfolder/index.txt";

//File name and location of copied file
$copied_file_name_location="C:/wamp64/www/dw3/newfolder/index.php";

//Copy a file and change its format extension
copy($file_name_location, $copied_file_name_location);

/* ******************************************* */
//5-Rename a File using rename()
/* ******************************************* */
//File name and location of existing file
$file_name_location="C:/wamp64/www/dw3/newfolder/index.php";

//File name and location of copied file
$renamed_file_name_location="C:/wamp64/www/dw3/newfolder/index2.txt";

//Copy a file and change its format extension
rename($file_name_location, $renamed_file_name_location);

/* ******************************************* */
//6-Delete a File using unlink()
/* ******************************************* */

//File name and location of existing file
$file_name_location_1="C:/wamp64/www/dw3/newfolder/index.txt";

//File name and location of copied file
$file_name_location_2="C:/wamp64/www/dw3/newfolder/index2.txt";

//Copy a file and change its format extension
unlink($file_name_location_1);
unlink($file_name_location_2);



/* ******************************************* */
//7-Superglobal variable $_FILES
/* ******************************************* */
/* All uploaded files are placed into the superglobal variable 
and associative system array $_FILES.
Content of $_FILES
$_FILES['file']['name'] The name of the uploaded file, including the extension (e.g., readme.txt)
$_FILES['file']['type'] The content type of the file (e.g., image/png, text/html, text/css)
$_FILES['file']['size'] The file’s size in bytes (e.g. 1,150 bytes)
$_FILES['file']['tmp_name'] The name of the temporary file stored on the server
$_FILES['file']['error'] The error code resulting from the file upload, when applicable
*/
