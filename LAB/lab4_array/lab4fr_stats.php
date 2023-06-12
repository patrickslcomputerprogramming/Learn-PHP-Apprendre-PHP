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
                <h1>Entrer vos données pour afficher leur Moyenne, Médiane et Mode.</h1>
                <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                    <label>
                        <p>Entrer au moins 3 nombres séparés par des virgules.</p>
                        <input type="text" name="dataset" />
                    </label>
                    <input type="submit" name="enter" value="SEND" />
                </form>
        <?php
            //If the form is submitted process the form action  
            } else {
                //Messages
                $error1="<p style=\"color:#ff0000;\">Entre au moins 3 nombres. Essayez encore!</p>";
                $message1="<p>Données ordonnées en ordre creoissant:</p>";
                $message2="<p>Nombre d'observations : </p>";
                $message3="<p>Moyenne : </p>";
                $message4="<p>Médiane : </p>";
                $message5="<p>Mode : </p>";
                $message6="<p>Il n'y a pas de mode!</p>";

                //Back button
                $button_back = "<button><a href=\"".$_SERVER['SCRIPT_NAME']."\">RETOUR</a></button>";

                //Retrieve the data collected from the form
                $dataset = explode (',' , $_POST['dataset']);
                sort($dataset, SORT_NUMERIC);
                $length_dataset = count($dataset);

                if ($length_dataset<3){
                    echo $error1 . "<br/><br/>";
                    echo $button_back;
                }else{
                    //Calculate mean
                    $mean = array_sum($dataset)/$length_dataset;
                    $mean = number_format($mean,2);
                    //Calculate median
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
                    //Calculate mode
                    $each_occurence=array_count_values($dataset);
                    $greatest=max($each_occurence);

                    if ($greatest>1){
                        foreach ($each_occurence as $item => $description){
                            if ($description==$greatest){
                                $mode[]=$item;
                            }
                        }
                    }
               
                    //Display outputs  
                    echo $message1 ;
                    echo "<table border=\"1\"><tr>";
                    foreach ($dataset as $item){
                        echo  "<td> $item  </td>" ;
                    }
                    echo "</tr></table>";

                    echo "<br/>". $message2 . "<table border=\"1\"><tr><td>$length_dataset</td></tr></table>";
                    echo $message3 . "<table border=\"1\"><tr><td>$mean</td></tr></table>";
                    echo $message4 . "<table border=\"1\"><tr><td>$median</td></tr></table>";
                    echo $message5;
                    if ($greatest>1){
                        echo "<table border=\"1\"><tr>";
                        foreach ($mode as $item){
                            echo "<td> $item </td>";
                        }
                        echo "</tr></table>";
                    }
                    else{
                        echo $message6;
                    }

                    echo "<br/>" . $button_back;
                }
    
            }
        ?>
    </body>
</html>

