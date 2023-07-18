<?php
//index.php
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script type="text/javascript" src="main.js"></script>
</head>

<body>
    <label for="continent">Continent:</label>
    <select id="continent" onchange="reset_city()">
        <option></option>
        <option>Africa</option>
        <option>America</option>
        <option>Antarctica</option>
        <option>Arctic</option>
        <option>Asia</option>
        <option>Atlantic</option>
        <option>Australia</option>
        <option>Europe</option>
        <option>Indian</option>
        <option>Pacific</option>
    </select>
    
    <label for="city">City:</label>
    <select id="city" name="cityName" onfocus="CityList()" onchange="timer_function()">
    </select>

    <div id="msg"></div>
   

</body>

</html>