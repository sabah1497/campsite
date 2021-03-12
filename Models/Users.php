<?php
require_once ('Database.php');

class Users
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getDbConnection();
    }

    public function checkAdmin($ID)
    {
        $sqlQuery = "SELECT * FROM login WHERE login.ID='$ID' AND login.admin='1'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
    }

    //public function addCampsite($nameID,$address,$contactDetails,$facilitiesOffered,$openingDates,$visitorRating)
    public function addCampsite($nameID,$address,$contactDetails,$openingDates,$visitorRating)
    {
       // $sqlQuery = "INSERT INTO Campsite (nameID,address,contactDetails,facilitiesOffered,openingDates,visitorRating) VALUES ('$nameID','$address','$contactDetails','$facilitiesOffered','$openingDates','$visitorRating')";
        $sqlQuery = "INSERT INTO Campsite (nameID,address,contactDetails,openingDates,visitorRating) VALUES ('$nameID','$address','$contactDetails','$openingDates','$visitorRating')";
//address,contactDetails,facilitiesOffered,openingDates,visitorRating)
//VALUES ('$nameID','$address','$contactDetails','$facilitiesOffered','$openingDates','$visitorRating')";

        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new CampsiteData($row);
        }
        return $dataSet;
    }

}