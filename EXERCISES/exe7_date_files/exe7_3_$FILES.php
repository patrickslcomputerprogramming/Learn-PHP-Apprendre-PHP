<?php
/**
 *exe7_3_$FILES.php
 *EXERCISE 7 NUMBER 3
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/
// If the form is not submitted yet Display it
if (!isset($_POST['send'])) {
    ?>
    <!DOCTYPE html>
    <html>
    
    <head>
        <title>File Upload Form</title>
    </head>
    
    <body>
        <form method='post' action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" enctype='multipart/form-data'>
            <input type='file' name='filename' size='10' />
            <input type='submit' name='send' value='Upload' />
        </form>
    
    </body>
    </html>
    
        <?php
    //Close if
    } 
    // If the form is submitted Process
    else {
    ?>
    <!DOCTYPE html>
    <html>
    
    <head>
        <title>File Upload Result</title>
    </head>
    
    <body>
        <?php
        // Condition 1 if users upload a file Do the actions after if. 
        if ($_FILES) {
            // Assign error
            $error = $_FILES['filename']['error'];
          
            // If there's an error 
            if ($error != 0) {
                switch ($error) {
                    case 1:
                        echo "<p>The uploaded file exceeds the upload_max_filesize directive in php.ini</p>";
                        break;
                    case 2:
                        echo "<p>The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.</p>";
                        break;
                    case 3:
                        echo "<p>The uploaded file was only partially uploaded.</p>";
                        break;
                    case 4:
                        echo "<p>No file was uploaded.</p>";
                        break;
                    case 6:
                        echo "<p>Missing a temporary folder.</p>";
                        break;
                    case 7:
                        echo "<p>Failed to write file to disk.</p>";
                        break;
                    case 8:
                        echo "<p>A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.</p>";
                        break;
                }
                echo "<div id=\"back\">";
                    $pageUrl = $_SERVER['SCRIPT_NAME'];
                    echo "<a href=\"$pageUrl\"><input type=\"submit\" value=\"Try again!\"></a>";
                echo "</div>";
            }
            // If there's no error but the file type does not correspond to the expectations
            elseif ($_FILES['filename']['type'] != 'image/jpeg' && 
                    $_FILES['filename']['type'] != 'image/gif' && 
                    $_FILES['filename']['type'] != 'image/png') {
                echo "<p>The file you uploaded is not a jpg, gif, or png image.</p>";
                echo "<div id=\"back\">";
                    $pageUrl = $_SERVER['SCRIPT_NAME'];
                    echo "<a href=\"$pageUrl\"><input type=\"submit\" value=\"Try again!\"></a>";
                echo "</div>";
            } 
            // If there's no error and the file type corresponds
            else {
                // Assign values  
                $name = $_FILES['filename']['name'];
                $tempName = $_FILES['filename']['tmp_name'];
                $size = $_FILES['filename']['size'] / 1000000;
                $type = $_FILES['filename']['type'];
                //Display outputs
                echo "<p>Your image was successfully uploaded!</p>";
                
                date_default_timezone_set('America/Montreal');
                $format="F d, Y - G:i:s";
                $current_timestamp=time();
                $currentDateTime=date($format,$current_timestamp);
                echo "<p>Upload Time : $currentDateTime H.</p>";
    
                echo "<p>File Name : $name</p>";
                echo "<p>File Server Name : $tempName</p>";
                echo "<p>File Size: $size MB</p>";
    
                //Copy the image file in the directory where this scipt is located
                move_uploaded_file($tempName, $name);
    
                //Display the image
                echo "<img src=\"$name\" />";
    
                echo "<div id=\"back\">";
                    $pageUrl = $_SERVER['SCRIPT_NAME'];
                    echo "<a href=\"$pageUrl\"><input type=\"submit\" value=\"Try again!\"></a>";
                echo "</div>";
            }
        }
        ?>
    </body>
    </html>
    <?php
    // Close else
    }
    ?>