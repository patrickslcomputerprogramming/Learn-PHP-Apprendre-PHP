<?php 
    
    //Boucle TANTQUE (WHILE Loop)
    //Assigne la valeur initiale du compteur
     $count = 1 ;

    //Spécifier la condition (Ici : valeur finale acceptée du compteur) 
    while ($count <= 10){
        //Code à répéter tant que la condition est vraie
        echo "$count x 10 = " . $count * 10 . "<br>";
        //Augmente la valeur du compteur pour l'arrêter après un certain nombre d'itérations
        ++$count;
    }

    echo"<br>" ;

    //Boucle JUSQU'A CE QUE (DO WHILE loop)
    //Assigne la valeur initiale du compteur
    $count = 1 ;

      
    do {
        //Code à répéter tant que la condition est vraie
        echo "$count x 10 = " . $count * 10 . "<br>";
        //Augmente la valeur du compteur pour l'arrêter après un certain nombre d'itérations
        ++$count;
    }while ($count <= 10);
    //Spécifier la condition (Ici : valeur finale acceptée du compteur)
    

     echo"<br>" ;

    //Boucle POUR (FOR loop)
    //Attribuer la valeur initiale, la valeur finale acceptée  du compteur (condition) et augmenter sa valeur
    for ($counter = 1; $counter <= 10; ++$counter){
        //Code à répéter tant que la condition est vraie
        echo "$counter x 10 = " . $counter * 10 . "<br>";
    }
    
     echo"<br>" ;

    //Opérateur CONTINUE 
    //Déclarer les variables et attribuer une valeur
    $count = 0;  
    $grades=array(88, 94, 30, 78);

    for ($counter = 0; $counter <= 3; ++$counter)
    {
        ////Passe à l'itération suivante lorsque la note est <60
        if ($grades[$counter]<60)
            continue; 
        //Seules les notes>=60 seront comptées
        $count=$count + 1;
    }
    ////Affiche le nombre de notes >=60
    echo"$count étudiants ont réussi.<br>";

    echo"<br>" ;

    //Opérateur BREAK
    //Déclarer des variables et attribuer des valeurs
    $vowels=array('a', 'e', 'i', 'o', 'u');
    $user_answer='u';

    for ($counter = 0; $counter <= 4; ++$counter)
    {
        //Allez après la boucle lorsque le caractère recherché est trouvé
        if ($vowels[$counter]==$user_answer)
            break;
    }

    //Affiche l'emplacement du caractère recherché et trouvé
    echo"$user_answer se trouve à la position ". ($counter + 1) . " dans ma liste"; 
    
    
    
