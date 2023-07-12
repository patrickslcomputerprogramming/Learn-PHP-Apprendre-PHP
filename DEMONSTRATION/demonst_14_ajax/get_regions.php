<?php
// Array with names
$adminRegionQC=array();
$adminRegionQC[] = "Bas-Saint-Laurent";
$adminRegionQC[] = "Saguenay–Lac-Saint-Jean";
$adminRegionQC[] = "Capitale-Nationale";
$adminRegionQC[] = "Mauricie";
$adminRegionQC[] = "Estrie";
$adminRegionQC[] = "Montréal";
$adminRegionQC[] = "Outaouais";
$adminRegionQC[] = "Côte-Nord";
$adminRegionQC[] = "Nord-du-Québec";
$adminRegionQC[] = "CRÉ de la Baie-James";
$adminRegionQC[] = "Cree Regional Authority";
$adminRegionQC[] = "Kativik Regional Government";
$adminRegionQC[] = "Gaspésie–Îles-de-la-Madeleine";
$adminRegionQC[] = "Chaudière-Appalaches";
$adminRegionQC[] = "Laval";
$adminRegionQC[] = "Lanaudière";
$adminRegionQC[] = "Laurentides";
$adminRegionQC[] = "Montérégie";
$adminRegionQC[] = "CRÉ de Longueuil";
$adminRegionQC[] = "CRÉ Montérégie Est";
$adminRegionQC[] = "CRÉ Vallée-du-Haut-Saint-Laurent";
$adminRegionQC[] = "Centre-du-Québec";

// get the q parameter from URL
$q = $_REQUEST["rqst"];

$correspondingName = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($adminRegionQC as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($correspondingName === "") {
        $correspondingName = $name;
      } else {
        $correspondingName .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $correspondingName === "" ? "There are no corresponding names" : $correspondingName;
?>