<?php

function getProvinceName(): array{
    //Set Province and Territories names
    $provinceName = array( "ALBERTA", "COLOMBIE-BRITANNIQUE", "ILE-DU-PRINCE-EDOUARD", "MANITOBA", "NOUVEAU-BRUNSWICK", "NOUVELLE-ECOSSE", "ONTARIO", "QUEBEC", "SASKATCHEWAN", "TERRE-NEUVE-ET-LABRADOR", "TERRITOIRES DU NORD-OUEST", "NUNAVUT", "YUKON" );
    //Return Province and Territories names
    return $provinceName;
}
function getMaskedName():string{
    //Select a name and calculate its properties
    $provinceName = getProvinceName();
    $min = 0;
    $max = count(value: $provinceName) - 1 ;
    $r = rand (min: $min, max: $max);
    $secretName = $provinceName[$r];
    $size = strlen(string: $secretName);
    $max =  $size -1;
    //Create a masked name with _ to replace all the characters, except 2
    $maskedName=$secretName;
    do{
        $r1 = rand (min: $min, max: $max);
        $r2 = rand (min: $min, max: $max);
    }while($r1==$r2);
    for ($i=0; $i<$size; $i++){
        if ($i!=$r1 && $i!=$r2 && $i!="-"){
            $maskedName[$i] = '_';
        }
    }
    //Return the masked name
    return $maskedName;
}