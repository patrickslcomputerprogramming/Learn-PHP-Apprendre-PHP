function showHint(str) {
    // If there's no data in the input display nothing  
    if (str.length === 0) {
        document.getElementById("txtHint").innerHTML = "WRITE IN THE INPUT"
    } 
    // If there's data in the field compare it to a region name
    else {
        // Declare and assign the array of region names
        adminRegionQC= new Array();
        adminRegionQC[0] = "Bas-Saint-Laurent";
        adminRegionQC[1] = "Saguenay–Lac-Saint-Jean";
        adminRegionQC[2] = "Capitale-Nationale";
        adminRegionQC[3] = "Mauricie";
        adminRegionQC[4] = "Estrie";
        adminRegionQC[5] = "Montréal";
        adminRegionQC[6] = "Outaouais";
        adminRegionQC[7] = "Côte-Nord";
        adminRegionQC[8] = "Nord-du-Québec";
        adminRegionQC[9] = "CRÉ de la Baie-James";
        adminRegionQC[10] = "Cree Regional Authority";
        adminRegionQC[11] = "Kativik Regional Government";
        adminRegionQC[12] = "Gaspésie–Îles-de-la-Madeleine";
        adminRegionQC[13] = "Chaudière-Appalaches";
        adminRegionQC[14] = "Laval";
        adminRegionQC[15] = "Lanaudière";
        adminRegionQC[16] = "Laurentides";
        adminRegionQC[17] = "Montérégie";
        adminRegionQC[18] = "CRÉ de Longueuil";
        adminRegionQC[19] = "CRÉ Montérégie Est";
        adminRegionQC[20] = "CRÉ Vallée-du-Haut-Saint-Laurent";
        adminRegionQC[21] = "Centre-du-Québec";

        // Calculate the number of regions in the array
        countRegions = adminRegionQC.length

        // Calculate the number of characters written in the intput
        inputSize = str.length

        // Initialize the output variable 
        var correspondingName = "";

        // Compare the data in the Input 
        // And each same size of characters of each array element 
        for (i=0; i<countRegions; i++) {
            if (adminRegionQC[i].length >= inputSize){
                if (str.toLowerCase() === (adminRegionQC[i].toLowerCase()).substring(0,inputSize)){
                    if (correspondingName === "") 
                        correspondingName = adminRegionQC[i];
                    else 
                        correspondingName += ", " + adminRegionQC[i]
                }
            }
        }
        // Output "message" if no hint was found 
        // Or the out variable with the list of hints when there are 
        output= (correspondingName === "") ? "There are no corresponding names" : correspondingName 
        document.getElementById("txtHint").innerHTML = output
    }
}