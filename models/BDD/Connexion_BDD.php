<?php
namespace BDD;

use PDO;

class Connexion_BDD {
    private $db_host;
    private $db_name;
    private $user;
    private $password;
    private $pdo;



    // Set the values needed for the connexion
    public function connexion($db_name="projetBeam",$db_host="localhost",$user='',$password=''){
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->user = $user;
        $this->password = $password;
    }


    // connect to the database
    public function getPDO() {
        if($this->pdo == null) {
        $conn = new PDO('mysql:dbname='.$this->db_name.';host='. $this->db_host,$this->user,$this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $conn;
        return $conn;
        } else {
            return $this->pdo;
        }
    }




    // GETTER & SETTER
        
    /**
     * Get the value of db_host
     */ 
    public function getDb_host()
    {
        return $this->db_host;
    }
    /**
     * Set the value of db_host
     *
     * @return  self
     */ 
    public function setDb_host($db_host)
    {
        $this->db_host = $db_host;
        return $this;
    }
    /**
     * Get the value of db_name
     */ 
    public function getDb_name()
    {
        return $this->db_name;
    }
    /**
     * Set the value of db_name
     *
     * @return  self
     */ 
    public function setDb_name($db_name)
    {
        $this->db_name = $db_name;
        return $this;
    }
    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
   
}
