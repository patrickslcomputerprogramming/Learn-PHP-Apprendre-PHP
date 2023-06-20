<?php
/**
 *exe12_1.php
 *EXERCISE 12 NUMBER 1
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
      .blueText {
        color: blue;
      }

      .container {
        width: 50%;
        border-radius: 6px;
        margin: 5px auto 5px auto;
        padding:2% 2% 2% 2%;
        border: 2px solid black;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <h1 class="blueText">Collecte de données pour analyse</h1>
      <hr>
      <!--Form-->
      <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
        <!--Form fields to input data-->
        <label for="input1">Entrer des nombres séparés par une virgule entre chaque 2 nombres</label>
        <input id="input1" type="text" name="userDataSet" required="required">
        <input id="submitbutton1" type="submit" name="send" value="SEND" />
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
      .redText {
        color: red;
      }

      #back {
        width: inherit;
        margin-right: auto;
        margin-left: auto;
      }

      table {
        margin: 1px auto 1px auto;
      }

      td {
        border: 1px solid black
      }

      .container {
        width: 50%;
        border-radius: 6px;
        margin: 5px auto 5px auto;
        border: 2px solid black;
        padding:2% 2% 2% 2%;
        text-align:center;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <h1>Resultat de l'analyse des données</h1>
      <hr>
      <?php
      //Assign the data collected from the form to variables
      $userInput = $_POST['userDataSet'];

      //Create message
      $messages['err'] = "Entrée erronée! N'entrez que des nombres séparés par une virgule entre chaque 2 nombres";

      //Load files
      require_once 'functions.php';

      //If the dataset include at least 1 value that is not a number
      if (getDataSet($userInput) === False) {
        echo '<p class="redText">' . $messages['err'] . '</p>';
      }
      //If the dataset include only values that are numbers
      else {
        //Load files
        require_once 'CountNumbers.php';
        require_once 'CombineNumbers.php';
        require_once 'CompareNumbers.php';

        //Create an object
        $currentCombine = new CompareNumbers(getDataSet($userInput));
        //Invoke methods
        $currentCombine->displayOutputs1();
        $currentCombine->displayOutputs2();
        $currentCombine->displayOutputs3();

      }

      ?>
      <div id="back">
        <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>"><input type="submit" value="RE-ESSAYEZ!"></a>
      </div>
    </div>
  </body>

  </html>
  <?php
}
?>

