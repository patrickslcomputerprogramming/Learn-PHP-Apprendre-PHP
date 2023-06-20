<?php
/**
 *index.php
 *LAB 6
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/
if (!isset($_POST['send'])) {
?>

<!DOCTYPE html>
<html>  
  <head>
    <title>Question</title>
    <style>
      h1{font-size:100%; text-align: center;}
      .bluetext{color:blue;}
      th, td {border: 1px solid #000000; text-align: left;}
      td.submit{border:none;}
      #submit1{margin-left:28%;}
      .container{width:50%;border-radius:6px; margin-right:auto; margin-left:auto;}
      form, table {margin-right:auto; margin-left:auto;}
    </style>
  </head>
  <body>	
    <div class="container">
        <h1 class="bluetext">Saison à partir d'une Date | Season by Date</h1>
        <hr>
        <!--Form--> 
        <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" >
          <table>
            <tr> 
              <th><label for=input1>Date</label></th>
              <td><input id=input1 type="date" name="theDate" required="required"></td> 
            </tr>
            <tr>	
              <td class="submit"></td> 
              <td class="submit"><input id="submit1" type="submit" name="send" value="SEND" /></td>
            </tr>
          </table>
        </form>
    </div> 
  </body>
</html>

<?php
}
//Form Handling
//Go below only after a user pressed the input button name="send" 
else {
?>

  <!DOCTYPE html>
  <html>  
  <head>
    <title>Answer</title>
    <style>
        .redtext{color:red;}
        h1, p{font-size:100%; text-align: center;}
        .container{width:50%; border: 1px solid #000000; border-radius:6px; margin-right:auto; margin-left:auto; padding:1% 1% 1% 1%;}
        #back{width:inherit; margin-right:auto; margin-left:auto;}
    </style>
  </head>
  <body>			
    <div class="container">
    <h1 class="bluetext">Saison à partir d'une Date | Season by Date</h1>
    <hr>

<?php
    //Retrieve the date entered and save it in an array (format: 2023-02-09 => YYYY-MM-DD)
    $userdata  = explode('-', $_POST["theDate"]);
    //Save the date entered in an associative array 
    $userInput = array('mm'=>$userdata[1], 
                        'dd'=>$userdata[2], 
                        'yyyy'=>$userdata[0]); 

    //Create a class
    class SeasonOfTheYear{

      //Constructor method for receiving and assigning the date 
      private $month, $day, $year, $season,$message;
      public function __construct ($m, $d, $y){
          $this->month = $m;
          $this->day = $d;
          $this->year = $y;
          $this->setSeason();
      }

      //Method for identifying the season
      private function setSeason(){
        //Identify Spring
        if (($this->month==3 && $this->day>=20) ||
            ($this->month==4) ||
            ($this->month==5) ||
            ($this->month==6 && $this->day<=19)){
                $this->season="Spring | Printemps";
                $this->message="Enjoy the flowers! | Profite des fleurs!";
        } 
        //Identify Summer
        elseif (($this->month==6 && $this->day>=20) ||
            ($this->month==7) ||
            ($this->month==8) ||
            ($this->month==9 && $this->day<=21)){
                $this->season="Summer | Été";
                $this->message="Enjoy the sun! | Profite du soleil!";
        }
        //Identify Fall
        elseif (($this->month==9 && $this->day>=22) ||
            ($this->month==10) ||
            ($this->month==11) ||
            ($this->month==12 && $this->day<=20)){
                $this->season="Fall | Automne";
                $this->message="Enjoy the wind! | Profite du vent!";
        }
        //Identify Winter
        else{    
            $this->season="Winter | Hiver";
            $this->message="Enjoy the snow! | Profite de la neige!";
        }
      }

      //Method for showing the data collected and calculated
      public function displayOutputs(){
        echo "<p>Date enterered | Date entrée:</p><p>".$this->day."-".
                            $this->month."-".$this->year."</p>";
        echo "<p>Corresponding season | Saison correspondante:</p><p>".$this->season."</p>";
        echo "<p>Message:</p><p>". $this->message."</p>";
      }

    }

    //Instantiate an object 
    $obj = new SeasonOfTheYear($m=$userInput['mm'], $d=$userInput['dd'], $y=$userInput['yyyy']); 
    //Invoke a method 
    $obj->displayOutputs();
    
?>

    <div id="back">
        <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>"><input type="submit" value="Redémarrez!"></a>
    </div>
    </div> 
  </body>
</html>

<?php
} 
?>












