<?php
/**
 *exe8_2.php
 *EXERCISE 8 NUMBER 2
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
      .bluetext{color:blue;}
    </style>
  </head>
  <body>			
    <h1>Dataset Analysis</h1>
    <hr>
    <!--Form--> 
    <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" > 
      <!--Form fields to input data-->
      <label for="input1">Enter a set of numbers with each 2 numbers separated by a comma</label> 
      <input id="input1" type="text" name="userDataSet" required="required"> 
      <input id="submitbutton1" type="submit" name="send" value="SEND" />
    </form> 
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
    </style>
  </head>
  <body>			
    <h1>Dataset Analysis Result</h1>
    <hr>
<?php
    //Assign the data collected from the form to variables
    $userInput=$_POST['userDataSet'];


    //Create function 
    function getDataSet($a){
        //Remove commas and create an array with the dataset
        $dataSet  = explode(',', $a);
        $isNotNumber=0;
        //Check if one of the array element is not a number
        foreach ($dataSet as $item){
          if (!preg_match("/[0-9]/",$item)){
            $isNotNumber++;
          }
        }
        //If at least one array element is not a number
        if ($isNotNumber>0){
          return FALSE;    
        }
        //If all the array elements are numbers
        else {
          return $dataSet;
        }   
    }

    //Create function that returns the number of elements in the array
    function getSize($a){
      return count($a);
    }

    //Create function that orders the numbers in ascending
    function getAscending(&$a){
      sort($a, SORT_NUMERIC);
    }

    //Create function that orders the numbers in descending
    function getDescending(&$a){
      rsort($a, SORT_NUMERIC);
    }
    

    //Create messages
    $messages=array(
            'err'=>'Please, enter only a set numbers with each 2 numbers separated by a comma.',
            'dataset'=>"You enterered the following numbers: ",
            'size'=>"The quantity of numbers you entered is: ",
            'asc'=>"The numbers entered ordered in ascending order: ",
            'des'=>"The numbers entered ordered in descending order: ",
            );
  
    //Create function 
    function display_output(){
      global $userInput;
      global $messages;
      //If the dataset include at least 1 value that is not a number
      if (getDataSet($userInput)===False){
          echo '<p class="redtext">' . $messages['err'] . '</p>';
      }
      //If the dataset include only values that are numbers
      else {
          //Display the dataset
          $userData=getDataSet($userInput);
          echo '<p>' . $messages['dataset'] . '</p>';
          foreach($userData as $item)
              echo "$item  "; 
          //Display the size of the dataset
          echo '<p>' . $messages['size'] ."</p><p>". getSize($userData) . '</p>';
          //Display the dataset in ascending
          getAscending($userData);
          echo '<p>' . $messages['asc'] . '</p>';
          foreach($userData as $item)
              echo "$item  ";
          //Display the dataset in descending
          getDescending($userData);
          echo '<p>' . $messages['des'] . '</p>';
          foreach($userData as $item)
              echo "$item  ";
      }

    } 

    //Call functions
    display_output();
   
?>
    <p><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Try again!</a></p>
  </body>
</html>

<?php
} 
?>












