<?php
//index.php
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dynamic Time by Zone</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="main.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="blueText">Find Time by Zone</h1>
        <hr>
        <!--Form-->
        <form id="form1" method="post" action="">
            <table>
                <!--
                <tr>
                    <th><label for=input1>Continent/City</label></th>
                    <td>
                        <input id=input1 type="text" id="continentName" list="existingContinentNames" onkeyup="continentHint(this.value)">
                        <datalist id="existingContinent">
                        </datalist>
                    </td>
                </tr>
                -->
                <tr>
                    <th><label for=input2>Continent/City</label></th>
                    <td>
                        <input id=input2 type="text" id="cityName" onblur="timezone(this.value)">
                        <!--<datalist id="existingContinent">
                            <option>America/Montreal</option>
                            <option>Asia/Pyongyang</option> 
                            <option>America/Toronto</option> 
                            <option>Europe/Amsterdam</option>
                            <option>Africa/Ouagadougou</option>
                        </datalist>-->
                    </td>
                </tr>
                <tr>
                    <th><label for=input3>Date and Time</label></th>
                    <!--<td><input id=input3 type="text" name="dateandtime" value=""></td>-->
                    <td><p><span id="txtHint"></span></p></td>
                </tr>
                <!--
                <tr class="submit">
                    <td></td>
                    <td><input id="submit1" type="submit" name="send" value="SEND" /></td>
                </tr>
                -->
            </table>
        </form>
    </div>
    <!--
    <div id="msg"></div>
    <br>
    <input type=button value='Get Server Time' onclick="timer_function();">
    <input type="hidden" onload="timer_function();">
    -->
</body>

</html>