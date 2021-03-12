<?php
require_once ('Database.php');
class Login

{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }


    public function checkEmail($emailAddress)
    { //check the database to see if the email exists if it doesnt redirect them to the register page
        //return true;
        $sqlQuery = "SELECT emailAddress FROM login WHERE emailAddress ='$emailAddress'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        if ($statement->fetch() == null) {
            return false;
        } else {
            return true;
        }

    }

    public function checkPassword( $password)
    {
        //check to see if the password entered matches the password with the email when registered
        //$password = md5($password);

        $sqlQuery = "SELECT password FROM login WHERE password = '$password'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        //$password = (string) $password;
        $hashtest= $statement->fetch();

        // $tmp = (string)$hash[0];

        //var_dump($tmp);

        //$hash = (string) $hash;
        //the password verify takes a plain text password and the hashed string and returns true if the hash matches the password inputted by the user
        if(password_verify($password, $hashtest[0]) or hash_equals($hashtest [0], $password))
        {
            return true;
        } else {
            return false;
        }
    }



    public function login($emailAddress,$password)
    {

        $sqlQuery = "SELECT emailAddress FROM login WHERE emailAddress='$emailAddress' AND password = '$password'";
        try {
            $statement = $this->_dbHandle->prepare($sqlQuery);
            $res = $statement->execute();
        }
        catch (mysqli_sql_exception $exception)
        {
            echo $exception;
        }

        // echo $res;
        return $res;
    }

}
