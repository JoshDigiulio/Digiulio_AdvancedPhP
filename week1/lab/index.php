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
            
            
            if ( empty($fullname) ) 
                {
                $message = '';
                
                } else if ( empty($email) ) {
                $message = '';
                
                } else if ( empty($addressline1) ) {
                $message = '';
                
                } else if ( empty($city) ) {
                $message = '';
                
                } else if ( empty($state) ) {
                $message = '';
                
                } else if ( empty($zip) ) {
                $message = '';
                
                } else if ( empty($birthday) ) {
                $message = '';
                
            } else if ( addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday ) ) {
                $message = 'Adress Added';
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
        include './templates/viewaddress.php';
        ?>
        
        
        
    </body>
</html>
