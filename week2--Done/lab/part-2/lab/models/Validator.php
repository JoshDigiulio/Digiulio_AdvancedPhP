<!-- Page Finished -->

<?php


class Validator 
{
  
    public function emailIsValid($email)
    {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }
    
 public function passwordIsEmpty($password) 
   {
        if (empty($password)) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
    public function fullnameIsValid($fullname) 
    {
        return (!empty($fullname)&& preg_match('/^(?:[A-Za-z]+(?:\s+|$)){2,3}$/', $fullname) );
    }
    
    public function adressIsValid($addressline1) 
    {
        return ( !empty($addressline1) &&preg_match('^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$^', $addressline1) );
    }
    
    public function cityIsValid($city) 
    {
        return (!empty($city) && preg_match('/^[a-zA-Z ]+$/', $city) );
    }
    
    public function stateIsValid($state) 
    {
        return ( !empty($state) &&preg_match('/^(A[LKSZRAP]|C[AOT]|D[EC]|F[LM]|G[AU]|HI|I[ADL N]|K[SY]|LA|M[ADEHINOPST]|N[CDEHJMVY]|O[HKR]|P[ARW]|RI|S[CD] |T[NX]|UT|V[AIT]|W[AIVY])$/', $state) );
    }
    
    public function zipIsValid($zip) 
    {
        return (!empty($zip)&& preg_match('/^([0-9]{5})(-[0-9]{4})?$/i', $zip) );
    }
    
    public function birthdayIsValid($birthday) 
    {
        return ( !empty($birthday));
    }
}
