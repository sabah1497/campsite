<?php

class CampsiteData {
    
    public $_ID, $_nameID, $_address, $_contactDetails, $_facilitiesOffered, $_openingDates, $_visitorRating, $_photo;
    
    public function __construct($dbRow) {
        $this->_ID = $dbRow['ID'];
        $this->_nameID = $dbRow['nameID'];
        $this->_address = $dbRow['address'];
        $this->_contactDetails = $dbRow['contactDetails'];
        $this->_facilitiesOffered = $dbRow['facilitiesOffered'];
        $this->_openingDates = $dbRow['openingDates'];
        $this->_visitorRating = $dbRow['visitorRating'];
        $this->_photo = $dbRow['photo'];
    }

    public function getID() {
        return $this->_ID;
    }

    public function getNameID() {
        return $this->_nameID;
    }
   
    public function getAddress() {
       return $this->_address;
    }
    
    public function getContactDetails() {
       return $this->_contactDetails;
    }
    
    public function getFacilitiesOffered() {
       return $this->_facilitiesOffered;
    }
    
    public function getOpeningDates() {
       return $this->_openingDates;
    }

    public function getVisitorRating() {
        return $this->_visitorRating;
    }

    public function getPhoto() {
        return $this->_photo;
    }

}
