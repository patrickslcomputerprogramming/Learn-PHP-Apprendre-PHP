<?php
/**
 *exe8_3.php
 *EXERCISE 8 NUMBER 3
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
        <h1 class="bluetext">Date de naissance, Aujourd'hui et Age</h1>
        <hr>
        <!--Form--> 
        <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" >
          <table>
            <tr> 
              <th><label for=input1>Entrez votre date de naissance</label></th>
              <td><input id=input1 type="date" name="theBirthday" required="required"></td> 
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
    <h1 class="bluetext">Date de naissance, Aujourd'hui et Age</h1>
    <hr>

<?php
    //Retrieve the date entered and save it in an array (format: 2023-02-09 => YYYY-MM-DD)
    $userdata  = explode('-', $_POST["theBirthday"]);
    //Save the date entered in an associative array 
    $userInput = array('mm'=>$userdata[1], 
                        'dd'=>$userdata[2], 
                        'yyyy'=>$userdata[0]); 
    //Create function
    function set_birthday($a){
        if (checkdate($a['mm'], $a['dd'], $a['yyyy']))
            return TRUE;
        else
            return FALSE;
    }
    //Create function
    function get_current_date(){
        $nowText=date('F d, Y');
        $nowNumber=strtotime('today');
        $nowDate=array('str'=>$nowText, 'nbr'=>$nowNumber);
        return $nowDate;
    }
    //Create function
    function get_birthday($a, $b){
      $dy=$a['dd'];
      $mt=$a['mm'];
      $yr=$a['yyyy'];
      if (strtotime("$dy-$mt-$yr")<$b){   
          $birthText=date('F d, Y', mktime(0,0,0,$a['mm'], $a['dd'], $a['yyyy']));
          $birthNumber=strtotime("$dy-$mt-$yr");
          $birthDate=array('str'=>$birthText, 'nbr'=>$birthNumber);
          return $birthDate;
      }
      else {
          return FALSE;
      }
    } 
    //Create function  
    //$a is birthdate and $b is nowdate
    function get_age($a, $b){
        $ageInDays = floor(($a - $b) / 86400);
        $ageInYears = floor($ageInDays / 365);
        $ageInMonths = floor(($ageInDays - ($ageInYears * 365)) / 30);
        $age=array('inMonth'=>$ageInMonths, 'inYear'=>$ageInYears);
        return $age;
    }
    //Create function
    function all_messages(){
      $messages=array(
        'errValid'=>'Erreur! La date de naissance entré est invalide.',
        'errBefore'=>"Erreur! La date de naissance entré n'est pas antérieure à la date d'aujourd'hui.",
        'birthDate'=>"Votre date de naissance est: ",
        'todayDate'=>"Aujourd'hui est: ",
        'age'=>"Conséquemment, vous avez: ",
        'year'=>"années et ",
        'month'=>"mois."
        );
      return $messages;
    }
    //Create function
    function display_output(){
      global $userInput;
      $msg = all_messages();
      if (set_birthday($userInput)==FALSE){
        echo'<p class="redtext">'.$msg['errValid'].'</p>';
      }else{
        $currentDate=get_current_date();
        if (get_birthday($userInput, $currentDate['nbr'])==FALSE){
          echo'<p class="redtext">'.$msg['errBefore'].'</p>';
        }
        else{
          $birtdayDate=get_birthday($userInput, $currentDate['nbr']);
          $yourAge=get_age($currentDate['nbr'], $birtdayDate['nbr']);
          echo'<p>'. $msg['birthDate'] . $birtdayDate['str'] . '</p>';
          echo'<p>'. $msg['todayDate'] . $currentDate['str'] . '</p>';
          echo'<p class="redtext">' . $msg['age'] . $yourAge['inYear'] . 
              " " . $msg['year'] . $yourAge['inMonth'] . " " . $msg['month'] . '</p>';
        }     
      }
    }
    //Call function
    display_output();
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












