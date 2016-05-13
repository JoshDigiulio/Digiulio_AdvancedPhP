<?php
//Create a session for the user:
require_once './autoload.php';
session_start();

$util = new Util();

//End session for the user:
$logout = filter_input(INPUT_GET, 'logout');

//Checks to see if the person logged out in the session:
if ($logout == true) 
{
    $_SESSION['user_id'] = null;
}

 //If the user is not in a session put him to the index page:
if (!isset($_SESSION['user_id'])) 
{
    $util->redirect('index.php');   
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        
          <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">    
    
    </head> 
    <body>
        
                <h2>Admin Page</h2>
                  
                <p>Hello.</p>
                  
                <!-- Navigation -->
                <H2><a href="?logout=true" >Log Out</a></H2>
    </body>
</html>                                		