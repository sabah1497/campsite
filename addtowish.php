<?php
session_start();

require_once('Models/CampsiteDataSet.php');

    $view = new stdClass();

    if (isset($_POST['wish']))
    {
        $campsiteDataSet = new CampsiteDataSet();
          $view->campsiteDataSet= $campsiteDataSet->addtowish($_POST['campsiteID'], $_POST['userID']);
          echo 'it works';
    }

    else
    {
        echo'no';
    }

require_once('Views/display.phtml');
