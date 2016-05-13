<?php

class Signup extends DB
{

     function __construct() {
        
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');
        
    }
    //Save the user info to the database:
    public function save($email, $password) 
    {
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->getDb()->prepare("INSERT INTO users set email = :email, password = :password");

        $binds = array(
            ":email" => $email,
            ":password" => $hash
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            return true;
        }
        return false;
    }
   //Checks to see if the email already has a account
    public function emailExist($email) 
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
