<?php

try {
    //Declare login info
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    //1-Connect to the DBMS MySQL
    $connection = new mysqli(username: $username, password: $password, hostname: $hostname);
    
    //2-Create the DB customer if it doesn't exist yet
    $sql_code = "CREATE DATABASE IF NOT EXISTS customer;";
    $connection->query($sql_code);

    //3-Connect to the DB customer
    $sql_code = "USE customer;";
    $connection->query($sql_code);

    //4-Create the TABLE student if it doesn't exist yet
    $connection->query("CREATE TABLE IF NOT EXISTS student(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(35) NOT NULL,
    lastname VARCHAR(35) NOT NULL
    ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");
    
    //5-Check that the TABLE student exists
    $sql_code = "DESC student;";
    $connection->query($sql_code);
    
    //6-Insert data into the TABLE student
    $sql_code = "INSERT INTO student (firstname, lastname)
        VALUES ('Patrick', 'Saint-Louis')";
    $connection->query($sql_code);
    
    //7-Select data from the TABLE student
    $sql_code = "SELECT * FROM student";
    $result = $connection->query($sql_code);
    
    //8-Display data selected from the TABLE student
    $count_row = $result->num_rows;
    for ($i = 0; $i < $count_row; ++$i) {
        $each_row = $result->fetch_array(MYSQLI_ASSOC);
        echo '        ID : ' . $each_row['id'] . '<br>';
        echo 'First Name : ' . $each_row['firstname'] . '<br>';
        echo 'Last Name  : ' . $each_row['lastname'] . '<br>';
    }
    
    //9-Disconnect from the DBMS MySQL
    $result->close();
    $connection->close();
} catch (mysqli_sql_exception $error) {
    //if there an error 
    $msg_erreur['personnalisé-utilisateur'] = "Something went wrong! Try again!";
    $msg_erreur['description-technicien'] = $error->getMessage();
    $msg_erreur['nom-fichier-technicien'] = $error->getFile();
    $msg_erreur['numero-ligne-technicien'] = $error->getLine();
    echo implode("<br/>", $msg_erreur);
}
