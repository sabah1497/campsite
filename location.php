<?php
session_start();
//require_once ('Models/Database.php');
//require_once('Models/CampsiteDataSet.php');

//$view = new stdClass();
//$view->pageTitle = 'Locations';
//
//$CampsiteDataSet = new CampsiteDataSet();
//
//if(isset($_GET['location']))
//
//{
//    if ($_GET['location']="france")
//
//    $view->campsiteDataSet = $CampsiteDataSet->fetchFranceCampsites();
//}

require_once('Views/location.phtml');