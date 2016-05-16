<?php
//Page Done [x]
class Util 
{
   public function isPostRequest() 
   {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
   }
     
   public function getDBConfig() 
   {
       return array(
                        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016',
                        'DB_USER' => 'root',
                        'DB_PASSWORD' => ''
                    );       
   }    
}
