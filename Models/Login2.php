<?php

require_once ('Database.php');

class Login2
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getDbConnection();
    }

    public function checkEmail($email)
    {
        $sqlQuery = "SELECT emailAddress FROM login WHERE emailAddress ='$email'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        if ($statement->fetch() == null) {
            return false;
        } else {
            return true;
        }
    }

    public function checkPassword($email, $pass)
    {
        $sqlQuery = "SELECT password FROM login WHERE emailAddress = '$email'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $hashtest= $statement->fetch();

        if(password_verify($pass, $hashtest[0]) or hash_equals($hashtest [0], $pass))
        {
            return true;
        } else {
            return false;
        }
    }
}