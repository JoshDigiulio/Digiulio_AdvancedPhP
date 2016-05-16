<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title></title>
       <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"> 
    </head>
    
    <body>
       
        <!-- Functions calls and template calls needed to view my address book. -->
        <?php
        require_once './functions/dbconnect.php';
        require_once './functions/data.php';
        $address = getAllAdress();
        include './templates/viewaddress.php';
        ?>
        
        <input type="button" onclick="location.href='index.php';" value="Back" class="btn btn-primary" />
        
    </body>
</html>
