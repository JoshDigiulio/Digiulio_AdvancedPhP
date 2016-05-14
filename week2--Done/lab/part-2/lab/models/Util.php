<!-- Page Finished -->

<?php


class Util 
{
    // Is a post request being made?
   public function isPostRequest() 
   {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
   }    
}
