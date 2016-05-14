<!-- Page Finished -->

<?php

class Address  extends DB {
    //put your code here
    
    function __construct() {
        
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');
        
    }
    
    function getAll() {
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM address");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        
        return $results;
    }
    
    function add($fullname, $email, $addressline1, $city, $state, $zip, $birthday ) 
    {
        //Connect to database:
        $db = $this->getDB();
        //Instert the values gathered into the tables of the database:
        $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, birthday = :birthday" );
        $binds = array
                
        (
        ":fullname" => $fullname,
        ":email" => $email,
        ":addressline1" => $addressline1,
        ":city" => $city,
        ":state" => $state,
        ":zip" => $zip,
        ":birthday" => $birthday,
        
        );
    
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
         return true;
        }
    
     return false;
    }
}
