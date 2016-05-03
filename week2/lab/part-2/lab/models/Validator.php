<!-- -->

<?php


class Validator 
{
    
    public function emailIsValid($email)
    {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }
    
   
    public function phoneIsValid($phone) 
    {
        return ( preg_match("/^\(?([2-9]{1}[0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/", $phone) );
    }
}
