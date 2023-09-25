<?php 

//1-UNIDIMENSIONAL NUMBERED ARRAYS
//Declare and Assignment- 1st way
$webA= array ("html", "css", "js", "php", 50);

//Declare and Assignment- 2nd way
$webB[] = "html";
$webB[] = "css";
$webB[] = "js";
$webB[] = "php";
$webB[] = 50;

//Declare and Assignment- 3rd way
$webC[0] = "html";
$webC[4] = 50;
$webC[1] = "css";
$webC[3] = "php";
$webC[2] = "js";

//Display single array elements
echo $webA[0]."<br>";
echo $webA[3]."<br>";
echo $webA[4]."<br>";
echo "<br>";
//Display single array elements
echo $webB[0]."<br>";
echo $webB[3]."<br>";
echo $webB[4]."<br>";
//Display single array elements
echo $webC[0]."<br>";
echo $webC[3]."<br>";
echo $webC[4]."<br>";


//Display multiple array elements using a loop

//Loop with a counter (i.e. For loop)
$arraySize=count($webA);
for ($i=0; $i<$arraySize; $i++){
    echo "Array Element #". $i+1 . ": ". $webA[$i] ."<br>";
}

//Loop without a counter
echo "<br>";
foreach($webA as $item){
    echo "$item<br>";
}


//2-UNIDIMENSIONAL ASSOCIATIVE ARRAYS
//Declare and Assignment- 1st way
$webD = array('html' => "HyperText Markup Language",
     	'css' => "Cascading Style Sheet",
     	'js' => "JavaScript",
     	'php' => "HyperText PreProcessor");

//Declare and Assignment- 2nd way
$webE['html'] = "HyperText Markup Language";
$webE['css'] = "Cascading Style Sheet";
$webE['js'] = "JavaScript";
$webE['php'] = "HyperText PreProcessor";

//Display single array elements
echo $webD['css']."<br>";
echo $webD['js']."<br>";
echo $webD['html']."<br>";
//Display single array elements
echo $webE['css']."<br>";
echo $webE['js']."<br>";
echo $webE['html']."<br>";

//Display multiple array elements using a loop
//Loop without a counter
echo "<br>";

foreach($webD as $item => $description){
    echo "$item : $description<br>";
}


//3-MULTIDIMENSIONAL NUMBERED ARRAYS
//Declare and Assignment- 1st way
$oxo = array(
    array('1', ' ', '0'),
    array('0', '0', '1'),
    array('1', '0', ' 1')
);

//Display multiple array elements using a loop
//Nested loop with a counter
for ($i=0; $i<3; ++$i){
    for ($j=0; $j<3; ++$j)
        echo "Row $i Colum $j : ". $oxo[$i][$j] ."<br/>";
}

echo "<br/><br/>";

//Declare and Assignment- 2nd way (combine several unidimensional arrays)
$array1=array('1', ' ', '0');
$array2=array('0', '0', '1');
$array3=array('1', '0', ' 1');

$arrayFinal[]=$array1;
$arrayFinal[]=$array2;
$arrayFinal[]=$array3;

//Display multiple array elements using a loop
//Loop with a counter
for ($i=0; $i<3; ++$i){
    for ($j=0; $j<3; ++$j)
        echo "Row $i Colum $j : ". $arrayFinal[$i][$j] ."<br/>";
}


//4-MULTIDIMENSIONAL ASSOCIATIVE ARRAYS
//Declare and Assignment- 1st way

$products = array(
    'web' => array(
        'html' => "HyperText Markup Language",
        'css' => "Cascading Style Sheet",
        'js' => "JavaScript",
        'php' => "HyperText PreProcessor"),

    'database' => array(
        'MySQL' => "My Structured Query Language",
        'Postgre' => 'Postgre Structured Query Language',
        'Oracle'=> "Oracle Structured Query Language"),

    'functional' => array(
        'c++' => "C Plus Plus",
        'py' => "Phyton",
        'c#' => "C Sharp")   
);

//Display multiple array elements using a loop
//Nested loop without a counter
echo"<pre>";
foreach($products as $section => $items)
    foreach($items as $key => $value)
        echo "$section:\t$key:\t$value<br>";
echo"</pre>";

//Declare and Assignment- 2nd way (combine several unidimensional arrays)
$singleArray1=array();
$singleArray1['fnam']='Pat';
$singleArray1['lnam']='San';
$singleArray1['num']='A01';

$singleArray2=array();
$singleArray2['fnam']='Rick';
$singleArray2['lnam']='Lou';
$singleArray2['num']='A02';

//Display single array elements
echo $singleArray1['num'].'<br>';
echo $singleArray2['num'].'<br>';

//Create an array of arrays
$multiArray['person1']=$singleArray1;
$multiArray['person2']=$singleArray2;

echo "<pre>";
    foreach ($multiArray as $section => $items)
        foreach ($items as $key => $value)
            echo "$section:\t$key:\t$value<br>";
echo "</pre>";



//Additional
//User data
$user_data['1'] = array(
    'theFullName' => 'Pat',
    'theBirthYear' => 2000
  );
  
  
  foreach ($user_data as $desc=>$value) {
  $name=$user_data[$desc]['theFullName'];
  $year=$user_data[$desc]['theBirthYear'];
  
  echo $name."<br>";
  echo $year."<br>";
  }








//FRENCH
//1-TABLEAUX NUMÉROTÉS UNIDIMENSIONNELS
//Déclaration et affectation - 1ère manière
$webA= array ("html", "css", "js", "php", 50);

//Déclaration et affectation - 2ème manière
$webB[] = "html";
$webB[] = "css";
$webB[] = "js";
$webB[] = "php";
$webB[] = 50;

//Déclaration et affectation - 3ème manière
$webC[0] = "html";
$webC[4] = 50;
$webC[1] = "css";
$webC[3] = "php";
$webC[2] = "js";

//Afficher un élément du tableau 
echo $webA[0]."<br>";
echo $webA[3]."<br>";
echo $webA[4]."<br>";
echo "<br>";
//Afficher un élément du tableau
echo $webB[0]."<br>";
echo $webB[3]."<br>";
echo $webB[4]."<br>";
//Afficher un élément du tableau
echo $webC[0]."<br>";
echo $webC[3]."<br>";
echo $webC[4]."<br>";


// Affiche plusieurs éléments du tableau à l'aide d'une boucle

// Boucle avec un compteur (par ex. une boucle For)
$arraySize=count($webA);
for ($i=0; $i<$arraySize; $i++){
    echo "Array Element #". $i+1 . ": ". $webA[$i] ."<br>";
}

// Boucle sans compteur
echo "<br>";
foreach($webA as $item){
    echo "$item<br>";
}


//2-TABLEAUX ASSOCIATIFS UNIDIMENSIONNELS
//Déclaration et affectation - 1ère manière
$webD = array('html' => "HyperText Markup Language",
     	'css' => "Cascading Style Sheet",
     	'js' => "JavaScript",
     	'php' => "HyperText PreProcessor");

//Déclaration et affectation - 2ème manière
$webE['html'] = "HyperText Markup Language";
$webE['css'] = "Cascading Style Sheet";
$webE['js'] = "JavaScript";
$webE['php'] = "HyperText PreProcessor";

//Afficher un élément du tableau
echo $webD['css']."<br>";
echo $webD['js']."<br>";
echo $webD['html']."<br>";
//Afficher un élément du tableau
echo $webE['css']."<br>";
echo $webE['js']."<br>";
echo $webE['html']."<br>";

// Affiche plusieurs éléments du tableau à l'aide d'une boucle
// Boucle sans compteur
echo "<br>";

foreach($webD as $item => $description){
    echo "$item : $description<br>";
}


//3-TABLEAUX NUMÉROTÉS MULTIDIMENSIONNELS
//Déclaration et affectation - 1ère manière
$oxo = array(
    array('1', ' ', '0'),
    array('0', '0', '1'),
    array('1', '0', ' 1')
);

//Affiche plusieurs éléments du tableau à l'aide d'une boucle
//Boucle imbriquée avec un compteur
for ($i=0; $i<3; ++$i){
    for ($j=0; $j<3; ++$j)
        echo "Row $i Colum $j : ". $oxo[$i][$j] ."<br/>";
}

echo "<br/><br/>";

//Déclaration et affectation - 2ème manière (combiner plusieurs tableaux unidimensionnels)
$array1=array('1', ' ', '0');
$array2=array('0', '0', '1');
$array3=array('1', '0', ' 1');

$arrayFinal[]=$array1;
$arrayFinal[]=$array2;
$arrayFinal[]=$array3;

// Affiche plusieurs éléments du tableau à l'aide d'une boucle
// Boucle avec un compteur
for ($i=0; $i<3; ++$i){
    for ($j=0; $j<3; ++$j)
        echo "Row $i Colum $j : ". $arrayFinal[$i][$j] ."<br/>";
}


//4-TABLEAUX ASSOCIATIFS MULTIDIMENSIONNELS
//Déclaration et affectation - 1ère manière
$products = array(
    'web' => array(
        'html' => "HyperText Markup Language",
        'css' => "Cascading Style Sheet",
        'js' => "JavaScript",
        'php' => "HyperText PreProcessor"),

    'database' => array(
        'MySQL' => "My Structured Query Language",
        'Postgre' => 'Postgre Structured Query Language',
        'Oracle'=> "Oracle Structured Query Language"),

    'functional' => array(
        'c++' => "C Plus Plus",
        'py' => "Phyton",
        'c#' => "C Sharp")   
);

// Affiche plusieurs éléments du tableau à l'aide d'une boucle
// Boucle imbriquée sans compteur
echo"<pre>";
foreach($products as $section => $items)
    foreach($items as $key => $value)
        echo "$section:\t$key:\t$value<br>";
echo"</pre>";

//Déclaration et affectation - 2ème manière (combiner plusieurs tableaux unidimensionnels)
$singleArray1=array();
$singleArray1['fnam']='Pat';
$singleArray1['lnam']='San';
$singleArray1['num']='A01';

$singleArray2=array();
$singleArray2['fnam']='Rick';
$singleArray2['lnam']='Lou';
$singleArray2['num']='A02';

//Afficher un élément du tableau
echo $singleArray1['num'].'<br>';
echo $singleArray2['num'].'<br>';

//Crée un tableau de tableaux
$multiArray['person1']=$singleArray1;
$multiArray['person2']=$singleArray2;

echo "<pre>";
    foreach ($multiArray as $section => $items)
        foreach ($items as $key => $value)
            echo "$section:\t$key:\t$value<br>";
echo "</pre>";


//ENGLISH VERSION
//1-UNIDIMENSIONAL NUMBERED ARRAYS
//Declare and Assignment- 1st way
$webA= array ("html", "css", "js", "php", 50);

//Declare and Assignment- 2nd way
$webB[] = "html";
$webB[] = "css";
$webB[] = "js";
$webB[] = "php";
$webB[] = 50;

//Declare and Assignment- 3rd way
$webC[0] = "html";
$webC[4] = 50;
$webC[1] = "css";
$webC[3] = "php";
$webC[2] = "js";

//Display single array elements
echo $webA[0]."<br>";
echo $webA[3]."<br>";
echo $webA[4]."<br>";
echo "<br>";
//Display single array elements
echo $webB[0]."<br>";
echo $webB[3]."<br>";
echo $webB[4]."<br>";
//Display single array elements
echo $webC[0]."<br>";
echo $webC[3]."<br>";
echo $webC[4]."<br>";


//Display multiple array elements using a loop

//Loop with a counter (i.e. For loop)
$arraySize=count($webA);
for ($i=0; $i<$arraySize; $i++){
    echo "Array Element #". $i+1 . ": ". $webA[$i] ."<br>";
}

//Loop without a counter
echo "<br>";
foreach($webA as $item){
    echo "$item<br>";
}


//2-UNIDIMENSIONAL ASSOCIATIVE ARRAYS
//Declare and Assignment- 1st way
$webD = array('html' => "HyperText Markup Language",
     	'css' => "Cascading Style Sheet",
     	'js' => "JavaScript",
     	'php' => "HyperText PreProcessor");

//Declare and Assignment- 2nd way
$webE['html'] = "HyperText Markup Language";
$webE['css'] = "Cascading Style Sheet";
$webE['js'] = "JavaScript";
$webE['php'] = "HyperText PreProcessor";

//Display single array elements
echo $webD['css']."<br>";
echo $webD['js']."<br>";
echo $webD['html']."<br>";
//Display single array elements
echo $webE['css']."<br>";
echo $webE['js']."<br>";
echo $webE['html']."<br>";

//Display multiple array elements using a loop
//Loop without a counter
echo "<br>";

foreach($webD as $item => $description){
    echo "$item : $description<br>";
}


//3-MULTIDIMENSIONAL NUMBERED ARRAYS
//Declare and Assignment- 1st way
$oxo = array(
    array('1', ' ', '0'),
    array('0', '0', '1'),
    array('1', '0', ' 1')
);

//Display multiple array elements using a loop
//Nested loop with a counter
for ($i=0; $i<3; ++$i){
    for ($j=0; $j<3; ++$j)
        echo "Row $i Colum $j : ". $oxo[$i][$j] ."<br/>";
}

echo "<br/><br/>";

//Declare and Assignment- 2nd way (combine several unidimensional arrays)
$array1=array('1', ' ', '0');
$array2=array('0', '0', '1');
$array3=array('1', '0', ' 1');

$arrayFinal[]=$array1;
$arrayFinal[]=$array2;
$arrayFinal[]=$array3;

//Display multiple array elements using a loop
//Loop with a counter
for ($i=0; $i<3; ++$i){
    for ($j=0; $j<3; ++$j)
        echo "Row $i Colum $j : ". $arrayFinal[$i][$j] ."<br/>";
}


//4-MULTIDIMENSIONAL ASSOCIATIVE ARRAYS
//Declare and Assignment- 1st way

$products = array(
    'web' => array(
        'html' => "HyperText Markup Language",
        'css' => "Cascading Style Sheet",
        'js' => "JavaScript",
        'php' => "HyperText PreProcessor"),

    'database' => array(
        'MySQL' => "My Structured Query Language",
        'Postgre' => 'Postgre Structured Query Language',
        'Oracle'=> "Oracle Structured Query Language"),

    'functional' => array(
        'c++' => "C Plus Plus",
        'py' => "Phyton",
        'c#' => "C Sharp")   
);

//Display multiple array elements using a loop
//Nested loop without a counter
echo"<pre>";
foreach($products as $section => $items)
    foreach($items as $key => $value)
        echo "$section:\t$key:\t$value<br>";
echo"</pre>";

//Declare and Assignment- 2nd way (combine several unidimensional arrays)
$singleArray1=array();
$singleArray1['fnam']='Pat';
$singleArray1['lnam']='San';
$singleArray1['num']='A01';

$singleArray2=array();
$singleArray2['fnam']='Rick';
$singleArray2['lnam']='Lou';
$singleArray2['num']='A02';

//Display single array elements
echo $singleArray1['num'].'<br>';
echo $singleArray2['num'].'<br>';

//Create an array of arrays
$multiArray['person1']=$singleArray1;
$multiArray['person2']=$singleArray2;

echo "<pre>";
    foreach ($multiArray as $section => $items)
        foreach ($items as $key => $value)
            echo "$section:\t$key:\t$value<br>";
echo "</pre>";



//Additional
//User data
$user_data['1'] = array(
    'theFullName' => 'Pat',
    'theBirthYear' => 2000
  );
  
  
  foreach ($user_data as $desc=>$value) {
  $name=$user_data[$desc]['theFullName'];
  $year=$user_data[$desc]['theBirthYear'];
  
  echo $name."<br>";
  echo $year."<br>";
  }
