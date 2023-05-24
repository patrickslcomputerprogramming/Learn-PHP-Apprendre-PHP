<?php 
    /*
     instruction IF (SI)
     1 SEULE OPTION SIMPLE OU COMBINÉE
     */
    // Affectation de variables
    $user_number=27;
    // La seule option ici c'est lorsque $user_number>=0
    if ($user_number>=0){
        echo"Vous avez écrit un nombre positif<br/>";
    }

    /*
     Instruction IF-ELSE (SI-SINON)
     SEULEMENT 2 OPTIONS SIMPLES OU COMBINÉES
     ELSE (SINON) EST APPLIQUÉ POUR TOUTES LES AUTRES OPTIONS QUI N'ONT PAS ÉTÉ PRISES EN COMPTE
    */
    // Affectation de variables
    $user_number=-27;
    // La 1ère option, là, c'est quand $user_number>=0
    // La 2ème option, là, c'est quand $user_number n'est pas >=0
    if ($user_number>=0){
        echo"Vous avez écrit un nombre positif<br/>";
    }else{
        echo"Vous avez écrit un nombre négatif<br/>";
    }

    /*
     Instruction IF-ELSEIF-ELSE
     PLUS DE 2 OPTIONS SIMPLES OU COMBINÉES
     ELSE (SINON) EST APPLIQUÉ POUR TOUTES LES AUTRES OPTIONS QUE IF ET ELSEIF N'ONT PAS PRIS EN COMPTE
    */
    // Affectation de variables
    $user_number=0;
    // La 1ère option ici, c'est quand $user_number>0
    // La 2ème option ici, c'est quand $user_number=0
    // La 3ème option ici, c'est quand $user_numbern'est pas > ou = 0
    if ($user_number>0){
        echo"Vous avez écrit un nombre positif<br/>";
    }elseif ($user_number==0){
        echo"Vous avez écrit un nombre nul<br/>";
    }else{
        echo"Vous avez écrit un nombre negatif<br/>";
    }
 
    /*
     ? déclaration
     SEULEMENT 2 OPTIONS SIMPLES OU COMBINÉES
     Le 1er message s'affiche uniquement lorsque la condition indiquée est vraie (si)
     Le 2ème message s'affiche uniquement lorsque la condition indiquée est fausse (sinon)
    */
    // Affectation de variables
    $user_number=-50;
    // La 1ère option existe quand $user_number>=0
    // La 2ème option ici, c'est quand $user_number n'est pas >=0
    echo $user_number >= 0 ? "Nombre Positif <br/>" : "Nombre Négatif<br/>";
    
    /*
     LIKE IF-ELSE-ELSEIF instruction
     PLUS DE 2 OPTIONS SIMPLES OU COMBINÉES SONT POSSIBLES
     LE DÉFAUT EST APPLIQUÉ POUR TOUTES LES AUTRES OPTIONS QUE LES AUTRES CAS N'ONT PAS PRIS EN COMPTE
    */
    // Affectation de variables
    $user_number='negatif';

	switch ($user_number){
    	case 'positif' :
        	echo "Nombre supérieur à 0.<br/>";
        	break;
    	case 'zero':
        	echo "Nombre égal à 0.<br/>";
        	break;
    	case 'negatif':
        	echo "Nombre inférieur à 0.<br/>";
        	break;
    	default:
        	echo "Vous n'avez pas entré une valeur correcte.<br/>";
	}

    /*
     OPTIONS COMBINÉES avec &&
     Toutes les conditions entre && doivent être vraies 
     afin que le programme exécute les instructions correspondantes
    */

    //Affecter les données lues à partir des champs de formulaire aux variables php 
    $userYear = 1999;
    $userCitizenship = 'Canadien';
    
    //Déclarer et initialiser des variables
    $now = getdate();
    $current_year = $now ['year'];
    $age = $current_year - $userYear;
    $message1='Vous êtes admissible à voter';
    $message2='Vous n’êtes PAS encore admissible à voter';
    $messages=array($message1, $message2);

    //Conditions et sortie
    if($age >= 18 && $userCitizenship == 'Canadien')
        echo $messages[0]."<br />";
    else
        echo $messages[1]."<br />";


    /*
     OPTIONS COMBINÉES avec || (ou)
     Au moins l'une des conditions entre || doivent être vraies 
     afin que le programme exécute les instructions correspondantes
    */

    //Affecter les données lues à partir des champs de formulaire aux variables php 
    $userNumber1 = -1999;
    $userNumber2 = -20;

    //Déclarer et initialiser des variables
    $message1="Au moins l'un de vos nombres est négatif";
    $message2="Aucun de vos nombres n'est négatif";
    $messages=array($message1, $message2);

    //Conditions et sortie
    if($userNumber1 < 0 || $userNumber2 < 0)
        echo $messages[0]."<br />";
    else
        echo $messages[1]."<br />";



    //ENGLISH
     /* 
    IF statement 
    ONLY 1 SINGLE OR COMBINED OPTION
    */
    // Variable assignment
    $user_number=27;
    // The only option there is when $user_number>=0
    if ($user_number>=0){
        echo"You wrote a positive number<br/>";
    }

    /* 
    IF-ELSE statement 
    ONLY 2 SINGLE OR COMBINED OPTIONS
    ELSE IS APPLIED FOR ALL THE OTHER OPTIONS THAT IF DIDN'T TAKE INTO ACCOUNT
    */
    // Variable assignment
    $user_number=-27;
    // The 1st option there is when $user_number>=0
    // The 2nd option there is when $user_number is not >=0
    if ($user_number>=0){
        echo"You wrote a positive number<br/>";
    }else{
        echo"You wrote a negative number<br/>";
    }

    /* 
    IF-ELSE-ELSEIF statement 
    MORE THAN 2 SINGLE OR COMBINED OPTIONS
    ELSE IS APPLIED FOR ALL THE OTHER OPTIONS THAT IF AND ELSEIF DIDN'T TAKE INTO ACCOUNT
    */
    // Variable assignment
    $user_number=0;
    // The 1st option there is when $user_number>0
    // The 2nd option there is when $user_number=0
    // The 3nd option there is when $user_numberis not > or = 0
    if ($user_number>0){
        echo"You wrote a positive number<br/>";
    }elseif ($user_number==0){
        echo"You wrote a null number<br/>";
    }else{
        echo"You wrote a negative number<br/>";
    }
 
    /* 
    ? statement 
    ONLY 2 SINGLE OR COMBINED OPTIONS
    The 1st message is displayed only when the condition indicated is true (if)
    The 2nd message is displayed only when the condition indicated is false (else)
    */
    // Variable assignment
    $user_number=-50;
    // The 1st option there is when $user_number>=0
    // The 2nd option there is when $user_number is not >=0
    echo $user_number >= 0 ? "Positive number <br/>" : "Negative number<br/>";
    
    /* 
    LIKE IF-ELSE-ELSEIF statement 
    MORE THAN 2 SINGLE OR COMBINED OPTIONS ARE POSSIBLE
    DEFAULT IS APPLIED FOR ALL THE OTHER OPTIONS THAT THE OTHER CASES DIDN'T TAKE INTO ACCOUNT
    */
    // Variable assignment
    $user_number='negativ';

	switch ($user_number){
    	case 'positive' :
        	echo "Number greater than 0.<br />";
        	break;
    	case 'zero':
        	echo "Number equal to 0.<br />";
        	break;
    	case 'negative':
        	echo "Number lower than 0.<br />";
        	break;
    	default:
        	echo "You didn't enter a correct value.<br />";
	}


    /*
       COMBINED OPTIONS with &&
       All conditions between && must be true
       in order to the program executes the corresponding instructions
    */

    //Assign data read from form fields to php variables
    $userYear = 1999;
    $userCitizenship = 'Canadian';

    //Declare and initialize variables
    $now = getdate();
    $current_year = $now['year'];
    $message1='You are eligible to vote';
    $message2='You are NOT yet eligible to vote';
    $messages=array($message1, $message2);

    //Conditions and output
    if($userYear <=($current_year-18) && $userCitizenship == 'Canadian')
        echo $messages[0]."<br />";
    else 
        echo $messages[1]."<br />";


    /*
       COMBINED OPTIONS with || (Where)
       At least one of the conditions between || must be true
       so that the program executes the corresponding instructions
    */

    //Assign data read from form fields to php variables
    $userNumber1 = 1999;
    $userNumber2 = -20;

    //Declare and initialize variables
    $message1="At least one of your numbers is negative";
    $message2="None of your numbers are negative";
    $messages=array($message1, $message2);

    //Conditions and output
    if($userNumber1 < 0 || $userNumber2 < 0)
        echo $messages[0]."<br />";
    else 
        echo $messages[1]."<br />";    















