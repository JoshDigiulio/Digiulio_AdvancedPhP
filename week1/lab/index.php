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
        
        
        $adress = getAllAdress();
        
        
        if ( isPostRequest() ) 
        {
            
            
            if ( empty($phone) ) {
                $message = 'Sorry Phone is Empty';
            } else if ( empty($phoneType) ) {
                $message = 'Sorry Phone Type is Empty';
            } else if ( addPhone($phone, $phoneType ) ) {
                $message = 'Phone Added';
                $phone = '';
                $phoneType = '';
            }
            
            
        }
          
 
        ?>
        
        
        
    </body>
</html>
