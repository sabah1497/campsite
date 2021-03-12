<?php

class Database {
    /**
     * @var Database
     */
    protected static $_dbInstance = null;

    /**
     * @var PDO
     */
    protected $_dbHandle;

    /**
     * @return Database
     */
    public static function getInstance() {
       $username ='sgb638';
       $password = 'PBsuf6SaUzKTnvW';
       $host = 'helios.csesalford.com';
       $dbName = 'sgb638_campsite';
       
       if(self::$_dbInstance === null) { //checks if the PDO exists
            // creates new instance if not, sending in connection info
            self::$_dbInstance = new self($username, $password, $host, $dbName);
        }

        return self::$_dbInstance;
    }

    /**
     * @param $username
     * @param $password
     * @param $host
     * @param $database
     */
    private function __construct($username, $password, $host, $database) {
        try { 
            $this->_dbHandle = new PDO("mysql:host=$host;dbname=$database",  $username, $password);
           
        }
        catch (PDOException $e) { // catch any failure to connect to the database
	    echo $e->getMessage();
	}
    }

    public function getdbConnection() {
        return $this->_dbHandle; //
    }

    public function __destruct() {
        $this->_dbHandle = null;
    }
}