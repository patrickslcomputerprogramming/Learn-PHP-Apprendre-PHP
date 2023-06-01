<?php
/**
 *exe6_4.php
 *EXERCISE 6 NUMBER 4
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
 */

//exercise6d/arrays
if ((isset($_GET['send2']))) {
    echo <<<_END
        <!DOCTYPE html>
        <html>  
        <head>
        <title>Answer2</title>
        <style>
            .container{width:50%;border-radius:6px; margin-right:auto; margin-left:auto;text-align:center;}
            .redtext{color:red;}
            th, td {border:1px solid #000000; color:blue;}
        </style>
        </head>
        <body>	
        <div class="container">		
        <h1 class="redtext">Registered List</h1>
        <hr>
    _END;

        $registration=array();

        //Assign the data collected from the form to variable
        $inputQuantity = $_GET["quantity"]; 

        for($id=1; $id<=$inputQuantity; $id++){
            $registration["Person $id"]["First Name"]= $_GET["fName$id"];
            $registration["Person $id"]["Last Name"]= $_GET["lName$id"];
            $registration["Person $id"]["Phone Number"]= $_GET["phoneN$id"];
        }

        //Display outputs
        foreach ($registration as $section => $items){
            echo"<table>";
                echo"<tr>";
                    echo"<th colspan=\"2\">";
                        echo "$section";
                    echo"</th>";
                echo"</tr>";
                echo"<tr>";
                    echo"<th>";
                        echo "Question";
                    echo"</th>";
                    echo"<th>";
                        echo "Answer";
                    echo"</th>";
                echo"</tr>";
                foreach ($items as $key => $value){
                    echo"<tr>";
                        echo"<td>";
                            echo "$key";
                        echo"</td>";
                        echo"<td>";
                            echo "$value";
                        echo"</td>";
                    echo"</tr>";
                }
            echo"</table>";
        }
        echo var_dump($registration);//For text-Must be removed
    echo <<<_END
        <a href="index.php">TryAgain</a>
    </div>
    </body>
    </html>
    _END;
}

?>












