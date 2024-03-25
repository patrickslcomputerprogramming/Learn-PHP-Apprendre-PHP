<!DOCTYPE html>

<head>
    <script type="text/javascript" src="main.js"></script>
    <style> #txtHint{color: red} </style>
</head>

<body>
    <h1>Start typing the name of an Administrative Region of Quebec and you will show suggestions of Administrative Region name that starts with the letters you already wrote when there are.</h1>
    <form action="">
        <label for="regionName">Administrative Region Name:</label>
        <input type="text" id="regionName" list="existingNames" onkeyup="showHint(this.value)"/>
        <datalist id="existingNames"> 
        </datalist>
    </form>
</body>

</html>
