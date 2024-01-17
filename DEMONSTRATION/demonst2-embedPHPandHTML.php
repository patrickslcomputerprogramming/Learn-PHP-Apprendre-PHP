
<!DOCTYPE html>
<html>

<head>
    <title>PHP in HTML</title>
    <style>
    .page-title {
        color: blue;
    }
    </style>
</head>

<body>
    <h1 class='page-title'>Welcome!</h1>
    <p>We're happy to have you as a customer. And you?</p>
    <p>Your satisfaction is our priority!</p>
  
</body>

</html>


---------------------------------------------------
1-echo each HTML element one by one

<!DOCTYPE html>
<html>

<head>
    <title>PHP in HTML</title>
    <style>
    .page-title {
        color: blue;
    }
    </style>
</head>

<body>
    <?php
        echo "<h1 class='page-title'>Welcome1!</h1>";
        echo "<p>We're happy to have you as a customer. And you?</p>"; 
        echo "<p>Your satisfaction is our priority!</p>";
    ?>
</body>

</html>

---------------------------------------------------
2-echo all HTML element once
<!DOCTYPE html>
<html>

<head>
    <title>PHP in HTML</title>
    <style>
    .page-title {
        color: blue;
    }
    </style>
</head>

<body>
    <?php
        echo "<h1 class='page-title'>Welcome2!</h1>
              <p>We're happy to have you as a customer. And you?</p>
              <p>Your satisfaction is our priority!</p>";
    ?>
</body>

</html>

-----------------------------------------------------------
3-Use all the elements as PHP literal (not as HTML code) 
Heredoc operator: echo <<<_END    ...   _END;
<!DOCTYPE html>
<html>

<head>
    <title>PHP in HTML</title>
    <style>
        .page-title {
            color: blue;
        }
    </style>
</head>

<body>
    <?php
    echo <<<_END
        <h1 class='page-title'>Welcome3!</h1>
        <p>We're happy to have you as a customer. And you?</p>
        <p>Your satisfaction is our priority!</p>
    _END;
    ?>
</body>

</html>
-----------------------------------------------------------
4-echo only the content of the elements (dynamic elements)
<!DOCTYPE html>
<html>

<head>
    <title>PHP in HTML</title>
    <style>
    .page-title {
        color: blue;
    }
    </style>
</head>

<body>
    <h1 class='page-title'><?php echo "Welcome4!" ?></h1>
    <p><?php echo "We're happy to have you as a customer. And you?" ?></p>
    <p><?php echo "Your satisfaction is our priority!" ?></p>
  
</body>

</html>


<!DOCTYPE html>
<html>

<head>
    <title>PHP in HTML</title>
    <style>
    .page-title {
        color: blue;
    }
    </style>
</head>

<body>
    <?php
    $welcome="Welcome4!";
    $happy="We're happy to have you as a customer. And you?";
    $slogan="Your satisfaction is our priority!";
    ?>
    <h1 class='page-title'><?php echo $welcome ?></h1>
    <p><?php echo $happy ?></p>
    <p><?php echo $slogan ?></p>
  
</body>

</html>
