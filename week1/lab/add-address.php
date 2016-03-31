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
        
        
        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');
        
        
        $address = getAllAdress();
        
        
        if ( isPostRequest() ) 
        {
            
        $fullnameRegex = '/^(?=\S+(?:\s\S+)+$)[\pL\s]{8,50}$/u';
        $fullname = filter_input(INPUT_POST, 'fullname');  
        
        $emailRegex = '^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$^';
        $email = filter_input(INPUT_POST, 'email');
        
       
        
        if ( !is_null($fullname) & !is_null($email) ) 
        {
            
            if ( !preg_match($fullnameRegex, $fullname) )
            {
                 $message = 'Please Enter your first and last name';
                 
            }
            else 
            {
                $message = 'yes name';
            }
            
            
            
        }
        
        
        
         if ( !is_null($email) ) 
        {
            
            if ( !preg_match($emailRegex, $email) )
            {
                 $message = 'no email';
                 
            }
            else 
            {
                $message = 'yes email';
            }
            
        }
        
        
            
            
            
            
            
            else if ( addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday ) ) {
              
                $message = '';
                $fullname = '';
                $email = '';
                $addressline1 = '';
                $city = '';
                $state = '';
                $zip = '';
                $birthday = '';
            }
            
            
        }
       
        include './templates/addressform.php';
        include './templates/messages.php';
        ?>
        
         
        
    </body>
</html>
