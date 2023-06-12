<!DOCTYPE html>
<html>
    <head>
        <title>Loop HTML Table</title>
    </head>
    <body>
        <?php
            // if form not yet submitted display form
            if (!isset($_POST['submit'])) 
            {
        ?>
                <h1>This will display a table for you</h1>
                <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                    <p>
                        <label>
                            <b>Number of rows|Nombres de lignes:</b> 
                            <input type="number" name="rows" min="1" required />
                        </label>
                    </p>
                    <p>
                        <label>
                            <b>Number of columns|Nombres de colonnes:</b>
                            <input type="number" name="columns" min="1" required />
                        </label>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Submit" />
                    </p>
                </form>
        <?php
        // if form submitted process form input
        } 
        else 
        {
            // retrieve number from POST submission
            $user_rows = $_POST['rows'];
            $user_columns = $_POST['columns'];
            // create the html table
            echo "<table border=\"1\">";
            for ($row=1; $row<=$user_rows; $row++) 
            {
                echo "<tr>";
                for ($col=1; $col<=$user_columns; $col++) 
                {
                    echo "<td>$row.$col</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br/><button><a href=\"".$_SERVER['SCRIPT_NAME']."\">RETOUR</a></button>";
        }
        ?>
    </body>
</html>