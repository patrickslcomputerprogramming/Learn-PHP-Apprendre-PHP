<!DOCTYPE html>
<html>
    <head>
        <style>
            td {
                border: solid 1px #000000;
            }
        </style>
        <title>Exe 2</title>
    </head>
    <body>
        <h1>3 Primary Colors RGB</h2>
        <table>
            <tr>
                <td><h2>Red</h2></td>
                <td style="width:63px; background-color:#ff0000;"></td>
            </tr>
            <tr>
                <!-- Qst 1 -->
                <td><h2><?php echo 'Blue'; ?></h2></td>
                <!-- Qst 2 -->
                <td style="width:63px; background-color:<?php echo '#0000ff';?>;"></td>
            </tr>
            <!-- Qst 3 -->
            <?php
                echo "<tr>";
                echo " <td><h2>Green</h2></td>";
                echo " <td style=\"width:63px; background-color:#008000\"></td>";
                echo "</tr>";
            ?>
        </table>
    </body>
</html>
