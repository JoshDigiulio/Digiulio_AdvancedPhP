<?php require_once './autoload.php'; ?>

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
        <?php
        Session_start();
        
        //Declare Variables:
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        
        //Instances of class's:
        $util = new Util();
        $validtor = new Validator(); 
        $login = new Login(); 

        //Collects the errors:
        $errors = array();
        
        //Check if a request is being made to the database:
        if ($util->isPostRequest()) 
        {
            //If their are no errors do the following:
            if (count($errors) <= 0) 
            {
                //Make sure the email is in the database to create a session for
                //them and move them to the admin page of the site:
                $user_id = $login->verifyCheck($email, $password);
                
                if ($user_id > 0) 
                {
                    //Redirect:
                    $_SESSION['user_id'] = $user_id;
                    $util->redirect('admin.php');
                   
                } 
                else 
                {
                    $errors[] = 'Username or password is incorrect.';
                }
            }
              
        }
        ?>
       
        <!-- Templates -->
        <?php include './templates/success-messages.php'; ?>
        <?php include './templates/error-messages.php'; ?>
        <?php include './templates/login-form.html.php'; ?>
        
        <!-- Navigation link -->
          <a href="signup.php">Sign Up</a>

    </body>
</html>
