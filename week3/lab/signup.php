<?php require_once './autoload.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       
       
    </head>


    <body>
        <?php
        //Variables:
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        //Instances of class's:
        $util = new Util();
        $validtor = new Validator();
        $signup = new Signup();

        //Keep track of all the error messages:
        $errors = array();

        //Is a post request being made to the database:
        if ($util->isPostRequest()) 
        {

            if (!$validtor->emailIsValid($email)) 
            {
                $errors[] = 'Please enter a email address.';
                $errors[] = 'That is not a vaild email address.';
            }

          
            if ($validtor->passwordValid($password))
            {
                $errors[] = 'Please enter a password.';
            }
            
            
            if ($signup->emailExist($email)) 
            {
                $errors[] = 'That email address is already on file.';
            }
            
            //As long as no errors exist the signup works otherwise it does not:
            if (count($errors) <= 0) 
            {

                if ($signup->save($email, $password)) 
                {
                    $message = 'Signup sucess!';
                } 
                
                else 
                {
                    $errors[] = 'Oops! something went wrong signup failed to register.';
                }
            }
        }
        ?>        
        
        
        <?php include './templates/success-messages.php'; ?>
        <?php include './templates/error-messages.php'; ?>    
        <?php include './templates/sign_up-form.php'; ?>
       
        <a href="index.php">Log In</a>

    </body>
</html>
