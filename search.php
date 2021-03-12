<?php
session_start();

require_once('Models/CampsiteDataSet.php');

$view = new stdClass();

$view->pageTitle = 'Search';

$CampsiteDataSet = new CampsiteDataSet();

if(isset($_POST['submitSearch']))
{
    $searchText=$_POST['search'];
    // $view->StudentDataSet=$CampsiteDataSet->fetchSomeStudents($searchText);

    $view->campsiteDataSet = $CampsiteDataSet->fetchSomeCampsites($searchText);
}
else
{
    $view->campsiteDataSet = $CampsiteDataSet->fetchAllCampsites();
}

require_once('Views/campsiteISv1.phtml');
