<?php

class Util 
{

   public function isPostRequest() 
   {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
   }
    
   
    public function redirect($page, array $params = array()) 
    {
        header('Location: ' . $this->createLink($page, $params));
        die();
    }
    
    /**
    * Get all values from a post form.
    * 
    * @return array
    */
    public function getPostValues() 
    {
        return filter_input_array(INPUT_POST);
    }

    
}
