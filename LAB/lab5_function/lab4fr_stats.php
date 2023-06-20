<?php
/**
 *labs_stats.php
 *LAB 5 - Functions
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mean-Median-Mode</title>
    </head>
    <body>
        <?php
            //If the form is not yet submitted display it
            if (!isset($_POST['enter'])) {
        ?>
                <h1>Entrez vos données pour afficher leur Moyenne, Médiane et Mode.</h1>
                <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                    <label>
                        <p>Entrez au moins 3 nombres séparés par des virgules.</p>
                        <input type="text" name="dataset" />
                    </label>
                    <input type="submit" name="enter" value="SEND" />
                </form>
        <?php
            //If the form is submitted process the form action  
            } else {
                //Retrieve the data collected from the form
                $info = $_POST['dataset'];

                //Function to save messages
                function messages(){
                    //Messages
                    $msg['tooMuchData']="<p style=\"color:#ff0000;\">Entrez au moins 3 nombres et seulement des nombres. Essayez encore!</p>";
                    $msg['orderAsc']="<p>Données ordonnées en ordre croissant:</p>";
                    $msg['nbrObs']="<p>Nombre d'observations:</p>";
                    $msg['mean']="<p>Moyenne:</p>";
                    $msg['median']="<p>Médiane:</p>";
                    $msg['mode']="<p>Mode:</p>";
                    $msg['noMode']="<p>Il n'y a pas de mode!</p>";
                    //Back button
                    $msg['button_back'] = "<button><a href=\"".$_SERVER['SCRIPT_NAME']."\">RETOUR</a></button>";
                    return $msg;
                }

                //Function to validate input, create an array dataset and order its data
                function getDataSet($data){
                    //Remove commas and create an array with the dataset
                    $dataSet = explode(',', $data);
                    $isNotNumber = 0;
                    //Check if one of the array element is not a number
                    foreach ($dataSet as $item) {
                        if (!preg_match("/[0-9]/", $item)) {
                            $isNotNumber++;
                        }
                    }
                    //If at least one array element is not a number
                    if ($isNotNumber > 0) {
                        return FALSE;
                    }
                    //If all the array elements are numbers
                    else {
                        //If there are less than 3 numbers 
                        if (count($dataSet)<3)
                            return FALSE;
                        //If there are at least 3 numbers
                        else{
                            //Sort the elements in ascending
                            sort($dataSet, SORT_NUMERIC);
                            return $dataSet;
                        }
                    }
                }

                //Function to calculate the Mean
                function getMean($dataset){
                    $mean = array_sum($dataset)/count($dataset);
                    $mean = number_format($mean,2);
                    return $mean;
                }

                //Function to calculate the Median
                function getMedian($dataset){
                    $length_dataset=count($dataset);
                    if ($length_dataset%2==0){
                        $index1=$length_dataset/2;
                        $index2=$index1-1;
                        $middle1=$dataset[$index1];
                        $middle2=$dataset[$index2];
                        $median =($middle1 + $middle2)/2;
                        $median =number_format($median,2); 
                    }else{
                        $index1= intval($length_dataset/2);
                        $median = $dataset[$index1];
                        $median = number_format($median,2);
                    }
                    return $median;
                }
                
                //Function to calculate the Mode
                function getMode($dataset){
                    $each_occurence=array_count_values($dataset);
                    $greatest=max($each_occurence);

                    if ($greatest>1){
                        foreach ($each_occurence as $item => $description){
                            if ($description==$greatest){
                                $mode[]=$item;
                            }
                        }
                        return $mode;
                    }
                    else
                        return FALSE; 
                }
               
                //Function to display outputs  
                function getOutputs($userData){
                    if (getDataSet($userData)===FALSE)
                        echo messages()['tooMuchData'];
                    else {
                        echo messages()['orderAsc'] ;
                        echo "<table border=\"1\"><tr>";
                            $allData=getDataSet($userData);
                            foreach ($allData as $item){
                                echo  "<td> $item  </td>" ;
                            }
                        echo "</tr></table>";

                        echo "<br/>". messages()['nbrObs'] . 
                        "<table border=\"1\">
                            <tr><td>".count($allData)."</td></tr>
                        </table>";

                        echo messages()['mean'] . 
                        "<table border=\"1\">
                            <tr><td>".getMean($allData)."</td></tr>
                        </table>";

                        echo messages()['median'] . 
                        "<table border=\"1\">
                            <tr><td>".getMedian($allData).
                        "</td></tr></table>";

                        if (getMode($allData)===FALSE)
                            echo messages()['noMode'];
                        else {
                            echo messages()['mode'] .
                            "<table border=\"1\"><tr>";
                                foreach (getMode($allData) as $item){
                                    echo "<td> $item </td>";
                                }
                            echo "</tr></table>";
                        }         
                    }
                }
            
            //Call the function to display outputs 
            //This function will call and manage the outputs of all the other functions
            getOutputs($info);
            echo "<br/>" . messages()['button_back'];

            }
        ?>
    </body>
</html>

