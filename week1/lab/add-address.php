<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
    <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    
    <body>
       
        
        <?php
        
        require_once './functions/dbconnect.php';
        require_once './functions/data.php';
        
        
        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');
        
        
        
        $address = getAllAdress();
        $message =''; 
        $errors = [];
        
        $fullnameRegex = '/^(?:[A-Za-z]+(?:\s+|$)){2,3}$/';
        $fullname = filter_input(INPUT_POST, 'fullname');  
        
        if ( isPostRequest() ) 
        {
            
            if ( !preg_match($fullnameRegex, $fullname) ) {
                 $errors[] = 'Fullnames invalid';
            } 
            
            if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
                $errors[] = 'Email invalid';
            }
            if (empty($birthday)){
                $errors[] = 'Birthday invalid';
            }
            

            if(count($errors)==0 ){
                if ( addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday ) ) {

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
            
        include './templates/success-messages.php';
        include './templates/error-messages.php';
        include './templates/addressform.php';
        
        
        ?>
        
         
        
    </body>
</html>
