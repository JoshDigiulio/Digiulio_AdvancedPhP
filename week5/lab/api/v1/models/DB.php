<?php
//Page Done[x]

class DB 
{    
    protected $db = null;
    protected $dbConfig = array();
       
    public function __construct($dbConfig)
    {
        $this->setDbConfig($dbConfig);      
    }
    
    protected function getDbConfig() 
    {
        return $this->dbConfig;
    }

    protected function setDbConfig($dbConfig) 
    {
        $this->dbConfig = $dbConfig;
    }
              
    public function getDB() 
    { 
        if ( null != $this->db ) 
        {
            return $this->db;
        }
        try 
        {
            $config = $this->getDbConfig();
            $this->db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } 
        catch (Exception $ex) 
        {          
           $this->closeDB();
           throw new Exception($ex->getMessage());
        }
           return $this->db;        
    }
    
     public function closeDB()
     {        
        $this->db = null;        
     }  
}
