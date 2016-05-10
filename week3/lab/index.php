<?php require_once './autoload.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       
        
    </head>
    <body>
        <?php
        session_start();
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

            if (count($errors) <= 0) 
            {

                $user_id = $login->verifyCheck($email, $password);
                
                if ($user_id > 0) 
                {
                    
                    $_SESSION['user_id'] = $user_id;
                    $util->redirect('admin.php');
                   
                } 
                else 
                {
                    $errors[] = 'Login Failed!';
                }
            }
              
        }
        ?>
       
        
        <?php include './templates/success-messages.php'; ?>
        <?php include './templates/error-messages.php'; ?>
        <?php include './templates/login-form.html.php'; ?>
        
          <a href="signup.php">Sign Up</a>

    </body>
</html>
