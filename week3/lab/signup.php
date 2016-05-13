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
            //Check to see if the email is correct:
            if (!$validtor->emailIsValid($email)) 
            {
                $errors[] = 'Please enter a email address.';
                $errors[] = 'That is not a vaild email address.';
            }

           //Check to see if the password is correct:
            if ($validtor->passwordValid($password))
            {
                $errors[] = 'Please enter a password.';
            }
            
            //Make sure the email is not already on file:
            if ($signup->emailExist($email)) 
            {
                $errors[] = 'That email address is already on file.';
            }
            
            //As long as no errors exist the signup works otherwise it does not:
            if (count($errors) <= 0) 
            {
                //If al goes well add them into the database:
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
        
        <!-- Templates -->
        <?php include './templates/success-messages.php'; ?>
        <?php include './templates/error-messages.php'; ?>    
        <?php include './templates/sign_up-form.php'; ?>
       
        <!-- Navigation -->
        <a href="index.php">Log In</a>

    </body>
</html>
