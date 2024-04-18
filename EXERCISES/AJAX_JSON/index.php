<!--index.php--> 
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Patrick Saint-Louis" />
    <title>AJAX - Receive JSON format response from PHP</title>
    <script type="text/javascript" src="main.js"></script>
    <style> #txtHint{color: red} </style>
</head>

<body>
    <h1>Start typing the name of an Administrative Region of Quebec and you will show suggestions of Administrative Region names that starts with the letters you already wrote when there are.</h1>
    <form action="">
        <label for="regionName">Administrative Region Name:</label>
        <input type="text" id="regionName" name="iRegionName" onkeyup="showHint(this.value)">
    </form>
    <p>Corresponding Names: <span id="txtHint"></span></p>
</body>

</html>
