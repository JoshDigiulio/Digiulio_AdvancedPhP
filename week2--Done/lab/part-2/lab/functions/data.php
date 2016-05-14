<!-- Page Finished -->

<?php
    //See if a request to submit a adress form to the address book database is 
    //being made:
    function isPostRequest() 
    {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }

    //Add a new address to the address book FUNCTION:
    function addAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday ) 
    {
        //Connect to database:
        $db = dbconnect();
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

    //Used to gather all of the database entries and place them into the view
    //address book page FUNCTION:
    function getAllAdress() 
    {    
        //Connect to databse:
        $db = dbconnect();
        $stmt = $db->prepare("SELECT * FROM address");

        //Gather all the of results found in the database into a array and use
        //it to populate the address-view page:
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0)
        {
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
    return $results;
}

