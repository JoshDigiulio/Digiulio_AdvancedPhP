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
        
        //Intilize the functions that are going to be needed:
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
        $address = getAllAdress();
        $message =''; 
        $errors = [];
        
        
        
        //Fullname regex:
        $fullnameRegex = '/^(?:[A-Za-z]+(?:\s+|$)){2,3}$/';
        $fullname = filter_input(INPUT_POST, 'fullname'); 
        
        //Address regex:
        $addressRegex = '^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$^';
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        
        //City regex:
        $cityRegex = '/^[a-zA-Z ]+$/';
        $city = filter_input(INPUT_POST, 'city');
        
        //State regex:
        $stateRegex = '/^(A[LKSZRAP]|C[AOT]|D[EC]|F[LM]|G[AU]|HI|I[ADL N]|K[SY]|LA|M[ADEHINOPST]|N[CDEHJMVY]|O[HKR]|P[ARW]|RI|S[CD] |T[NX]|UT|V[AIT]|W[AIVY])$/';
        $state = filter_input(INPUT_POST, 'state');
        
        //Zip regex:
        $zipRegex = '/^([0-9]{5})(-[0-9]{4})?$/i';
        $zip = filter_input(INPUT_POST, 'zip');
        
        
        //Check to see if the user hit submit and verify their input:
        if ( isPostRequest() ) 
        {
            //Fullname validation using regex:
            if ( !preg_match($fullnameRegex, $fullname) ) {
                 $errors[] = 'Please enter your first and last name.';
            } 
            //Email validation:
            if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
                $errors[] = 'Please enter a valid emial ex: Joshua@yahoo.com';
            }
            
            //Address validation using regex:
            if ( !preg_match($addressRegex, $addressline1) ) {
                 $errors[] = 'Please enter your address.';
            }
            
            //City validation using regex:
            if ( !preg_match($cityRegex, $city) ) {
                 $errors[] = 'Please enter your city (cannot contain numbers).';
            }
            
            //State validation using regex:
            if ( !preg_match($stateRegex, $state) ) {
                 $errors[] = 'Please enter your state abbrv. in capital letters ex: WA';
            }
            
            //Zip validaition using regex:
            if ( !preg_match($zipRegex, $zip) ) {
                 $errors[] = 'Please enter a valid five digit zip code.';
            }
            
            
            //Birthday is set up with a date picker so no invalid data can be
            //entered:
            if (empty($birthday)){
                $errors[] = 'Please select your birthday from the drop down menu.';
            }
            
            //If no errors are present submit the information to the database:
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
            
        //Call to my templates:
        include './templates/success-messages.php';
        include './templates/error-messages.php';
        include './templates/addressform.php';
        
        
        ?>
        
         
        
    </body>
</html>
