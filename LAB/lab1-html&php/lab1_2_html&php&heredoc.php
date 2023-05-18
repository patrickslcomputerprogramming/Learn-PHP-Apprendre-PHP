<!--lab1_2.php-->
<!DOCTYPE html>
<html>
    <head>
        <style>
            td {
                border: solid 1px #000000;
            }
        </style>
        <title>Labo 1_1</title>
    </head>
    <body>
        <!-- Qst 1 -->
        <?php	
        // Heredoc Operator <<<_END  _END  	
        echo <<<_END
        <h1>3 Primary Colors RGB</h2>
        <table>
            <tr>
                <td><h2>Red</h2></td>
                <td style="width:63px; background-color:#ff0000;"></td>
            </tr>
            <tr>
                <td><h2>Blue</h2></td>
                <td style="width:63px; background-color:#0000ff;"></td>
            </tr>
            <tr>
                <td><h2>Green</h2></td>
                <td style="width:63px; background-color:#008000"></td>
            </tr>
        </table>
        _END;
        ?>
    </body>
</html>
