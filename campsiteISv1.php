<?php
session_start();

require_once('Models/CampsiteDataSet.php');
$CampsiteDataSet = new CampsiteDataSet();
//if(isset($_GET['location']))
//
//{
//    if ($_GET['location']="france")
//
//        $view->campsiteDataSet = $CampsiteDataSet->fetchFranceCampsites();
//}
//
//else {
//    $view = new stdClass();
//    $campsiteDataSet = new CampsiteDataSet();
//    $view->campsiteDataSet = $campsiteDataSet->fetchAllCampsites();
//}

$view = new stdClass();
$campsiteDataSet = new CampsiteDataSet();
$action = '';
if(isset($_GET['location'])) {
    $action = $_GET['location'];
}
switch ($action)
{
    case ($_GET['location']="france");
        $view->campsiteDataSet = $CampsiteDataSet->fetchFranceCampsites();
        break;
    case ($_GET['location']="england");
        $view->campsiteDataSet = $CampsiteDataSet->fetchEnglandCampsites();
        break;
        case ($_GET['location']="italy");
            $view->campsiteDataSet = $CampsiteDataSet->fetchItalyCampsites();
            break;
    default:
        $view->campsiteDataSet = $campsiteDataSet->fetchAllCampsites();
        break;
}



    require_once('Views/campsiteISv1.phtml');