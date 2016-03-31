<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title></title>
        
    </head>
    
    <body>
       
        
        <?php
        require_once './functions/dbconnect.php';
        require_once './functions/data.php';
        $address = getAllAdress();
        include './templates/viewaddress.php';
        ?>
        <input type="button" onclick="location.href='index.php';" value="Back" />
        
    </body>
</html>

