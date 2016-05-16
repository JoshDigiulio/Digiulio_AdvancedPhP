<?php
//Page Done [x]
//Creating the corpresource class:
//Make sure it has the correct parameters needed:
//Update the interface for your REST API model that will have a set of standard
//functions.  (getAll, get, post, put, delete):
//Make sure it has the correct parameters needed:
                                                //Create a resource class for 
                                                //your corporations that 
                                                //implements the IRestModel 
                                                //interface: 
class CorporationResource extends DB implements IRestModel 
{ 
    function __construct() 
    {    
        $util = new Util();
        $this->setDbConfig($util->getDBConfig());              
    }
    //Update the interface for your REST API model that will have a set of 
    //standard functions.  (getAll):
    //Allow a user to get all records - getAll()
    public function getAll() 
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM corps");
        $results = array(); //Tip: All the functions should return an array. 
                            // If there is an issue or error, then an exception 
                            // can he thrown from the class and be used to send 
                            // back an error response.
        
        if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
            return $results;
    }
    //Update the interface for your REST API model that will 
    //have a set of standard functions.(get):
    //Allow a user to get one record - get()
    public function get($id) 
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM corps where id = :id");
        $binds = array(":id" => $id);
        $results = array(); //Tip: All the functions should return an array. 
                            // If there is an issue or error, then an exception 
                            // can he thrown from the class and be used to send 
                            // back an error response.
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
            return $results;
    }
    //Update the interface for your REST API model that will have a set of 
    //standard functions.(post);
    //Allow a user to create a new record - post()
    public function post($serverData) 
    {
        $stmt = $this->getDb()->prepare("INSERT INTO corps SET corp = :corp, email = :email, owner = :owner, phone = :phone, location = :location");
        $binds = array(
                        ":corp" => $serverData['corp'],
                        ":email" => $serverData['email'],
                        ":owner" => $serverData['owner'],
                        ":phone" => $serverData['phone'],
                        ":location" => $serverData['location']
                      );    //Tip: All the functions should return an array. 
                            // If there is an issue or error, then an exception 
                            // can he thrown from the class and be used to send 
                            // back an error response.

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            return true;
        }
            return false;
    }
    //Update the interface for your REST API model that
    //will have a set of standard functions. (put):
    //Allow a user to update one record - put()
    public function put($serverData, $id) 
    {
        $stmt = $this->getDb()->prepare("UPDATE corps SET corp = :corp, email = :email, owner = :owner, phone = :phone, location = :location WHERE id = :id");
        $binds = array(
                        ":corp" => $serverData['corp'],
                        ":email" => $serverData['email'],
                        ":owner" => $serverData['owner'],
                        ":phone" => $serverData['phone'],
                        ":location" => $serverData['location'],
                        ":id" => $id
                      );    //Tip: All the functions should return an array. 
                            // If there is an issue or error, then an exception 
                            // can he thrown from the class and be used to send 
                            // back an error response.

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            return true;
        }
            return false;
    }
    //Update the interface for your REST API model that will have
    //a set of standard functions.(delete):
    //Allow a user to delete a record - delete()
    public function delete($id) 
    {
        $stmt = $this->getDb()->prepare("DELETE FROM corps where id = :id");
        $binds = array(":id" => $id);
        $results = array(); //Tip: All the functions should return an array. 
                            // If there is an issue or error, then an exception 
                            // can he thrown from the class and be used to send 
                            // back an error response.
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            return true;
        }
            return false;
    }
}
