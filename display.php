<?php
session_start();
require_once('Models/CampsiteDataSet.php');

//$CampsiteDataSet = new CampsiteDataSet();

    $view = new stdClass();
    //$campsiteDataSet = new CampsiteDataSet();
    //$view->campsiteDataSet = $campsiteDataSet->fetchAllCampsites();

if (isset($_POST['viewMore'])) {
    $campsiteDataSet = new CampsiteDataSet();
    $view->campsiteDataSet = $campsiteDataSet->fetchAll($_POST['ID']);
}
else
    {
        echo 'Error';
    }

require_once('Views/display.phtml');
