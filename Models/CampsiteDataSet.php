<?php

require_once ('Database.php');
require_once('CampsiteData.php');

class CampsiteDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllCampsites()
    {
        $sqlQuery = 'SELECT * FROM Campsite';

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new CampsiteData($row);
        }
        return $dataSet;
    }

    public function register($username, $emailAddress, $password)
    {
        $sqlQuery = "INSERT INTO login (username,emailAddress,password) VALUES ('$username','$emailAddress','$password')";
        //echo $sqlQuery;

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

    public function check($emailAddress)
    {

        $sqlQuery = "SELECT emailAddress FROM login WHERE emailAddress = '$emailAddress'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        return $statement->rowCount();
    }


    public function addtowish($campsiteID, $userID)
    {
        $sqlQuery = "INSERT INTO Wish (campsiteID, userID) VALUES ('$campsiteID, $userID')";

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new CampsiteData($row);
        }
        return $dataSet;
    }

    public function fetchSomeCampsites($searchText)
    {

        $sqlQuery = "SELECT * FROM Campsite WHERE nameID LIKE '%".$searchText . "%' OR address LIKE '%" . $searchText . "%' OR openingDates LIKE '%" . $searchText . "%' OR visitorRating LIKE '%" . $searchText . "%'";

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $dataSet = [];
        {
            while ($row = $statement->fetch())
                $dataSet[] = new CampsiteData($row);
        }

        return $dataSet;
    }

    public function fetchFranceCampsites()
    {

        $sqlQuery = "SELECT * FROM Campsite WHERE address LIKE '%FRANCE%'";

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $dataSet = [];
        {
            while ($row = $statement->fetch())
                $dataSet[] = new CampsiteData($row);
        }
        return $dataSet;
    }

    public function fetchEnglandCampsites()
    {

        $sqlQuery = "SELECT * FROM Campsite WHERE address LIKE '%England%'";

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $dataSet = [];
        {
            while ($row = $statement->fetch())
                $dataSet[] = new CampsiteData($row);
        }
        return $dataSet;
    }

    public function fetchItalyCampsites()
    {

        $sqlQuery = "SELECT * FROM Campsite WHERE address LIKE '%Italy%'";

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $dataSet = [];
        {
            while ($row = $statement->fetch())
                $dataSet[] = new CampsiteData($row);
        }
        return $dataSet;
    }


    public function fetchAll($ID)
    {

        $sqlQuery = "SELECT * FROM Campsite WHERE Campsite.ID = '$ID'";

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $dataSet = [];

        while ($row = $statement->fetch())
        {
            $dataSet[] = new CampsiteData($row);
        }
        return $dataSet;
    }
}

