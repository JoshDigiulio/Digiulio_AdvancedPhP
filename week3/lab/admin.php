<?php
require_once './autoload.php';
session_start();

$util = new Util();

$logout = filter_input(INPUT_GET, 'logout');

if ($logout == true) 
{
    $_SESSION['user_id'] = null;
}

 
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
    </head> 
    <body>
        
                <h2>Admin Page</h2>
                <p>Hello.</p>
                <H2><a href="?logout=true" >Log Out</a></H2>
    </body>
</html>                                		