<!-- Page Finished  -->

<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
    <title></title>
        <!-- Style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    
    <body>
       
        
        <?php
        
        //Lab Part-2
        require_once './autoload.php';
        
        require_once './functions/dbconnect.php';
        require_once './functions/data.php';
        
        //Set up the variables that are being used:
        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');
        
        
        //Requests for all my address, error message and success message:
       
        $message =''; 
        $errors = [];
        
        //Lab part-2
        $util = new Util();
        $addressClass = new Address();
        
        $vaild = new Validator();
        
        //Lab Part-2
        //Check to see if the user hit submit and verify their input:
        if ($util->isPostRequest()) 
        {
            //Lab Part-2
            //Fullname validation using regex:
            if ( !$vaild->fullnameIsValid($fullname) ) 
            {
                 $errors[] = 'Please enter your first and last name.';
            } 
            
            //Lab Part-2
            //Email validation:
            if ( !$vaild->emailIsValid($email) )
            {
                $errors[] = 'Please enter a valid emial ex: Joshua@yahoo.com';
            }
            
            //Lab Part-2
            //Address validation using regex:
            if ( !$vaild->adressIsValid($addressline1)  )
            {
                 $errors[] = 'Please enter your address.';
            }
            
            //Lab Part-2
            //City validation using regex:
            if (!$vaild->cityIsValid($city)) 
            {
                 $errors[] = 'Please enter your city (cannot contain numbers).';
            }
            
            //Lab Part-2
            //State validation using regex:
            if (!$vaild->stateIsValid($state)) 
            {
                 $errors[] = 'Please enter your state abbrv. in capital letters ex: WA';
            }
            
            //Lab Part-2
            //Zip validaition using regex:
            if (!$vaild->zipIsValid($zip)) 
            {
                 $errors[] = 'Please enter a valid five digit zip code.';
            }
            
            //Lab Part-2
            //Birthday is set up with a date picker so no invalid data can be
            //entered:
            if (!$vaild->birthdayIsValid($birthday))
            {
                $errors[] = 'Please select your birthday from the drop down menu.';
            }
            
            //If no errors are present submit the information to the database:
            if(count($errors)==0 ){
                if ( $addressClass->add($fullname, $email, $addressline1, $city, $state, $zip, $birthday ) ) {

                   $message = 'Address has been added';
                   $fullname = '';
                   $email = '';
                   $addressline1 = '';
                   $city = '';
                   $state = '';
                   $zip = '';
                   $birthday = '';
               }
            }
        }
            
        //Call to my templates:
        include './templates/success-messages.php';
        include './templates/error-messages.php';
        include './templates/addressform.php';
        
        
        ?>
        
         
        
    </body>
</html>
