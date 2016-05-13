<?php

class Login extends DB
{

   function __construct() {
        
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');
        
    }
    //See if the email is on file and the password matches said email:
    public function verifyCheck($email, $password) 
    {  
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email");

        $binds = array(
            ":email" => $email,
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            
            
            if ( password_verify($password, $results['password']) ) 
            {
                return $results['user_id'];   
                
            }
        }
        return 0;
    }
     //Checks to see if the email is in the database: 
     public function emailNotCreated($email)
    {

        $stmt = $this->getDb()->prepare('SELECT * FROM users WHERE email = :email');

        $binds = array(
            ":email" => $email
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            return true;
        }
        return false;
    }

}
