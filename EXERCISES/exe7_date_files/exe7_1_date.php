//8.1.Date et heure actuelles à Montréal
//Créer un objet de la classe intégrée DateTime()

$format="d-m-Y h:i:s a";

$Zone='America/Montrea';

$timeZone=new DateTimeZone($Zone) or die("Invalide Zone.<br/>");
$currentDate = new DateTime(); 
//Appelez la méthode setTimezone pour spécifier la zone
$currentDate->setTimezone($timeZone);
//Appelez le format de méthode pour enregistrer la date/heure actuelle selon la zone indiquée
$currentDateFormatted = $currentDate->format($format);
//Afficher la date/heure actuelle selon la zone
echo "<p> Zone : $Zone </p>";
echo "<p> Date : $currentDateFormatted </p>";