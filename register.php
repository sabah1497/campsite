<?php
session_start();
require_once ('Models/Database.php');
require_once('Models/CampsiteDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Register';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];

    $CampsiteDataSet = new CampsiteDataSet();
    $CampsiteDataSet->register($_POST['username'], $_POST['emailAddress'], $_POST['password']);
    echo "<script> alert ('You have successfully signed up')</script>";
    echo "<script>location.href='/index.php'</script>";
    $_SESSION['login'] = true;
}
//else
//    {
//        $campsiteDataSet = new CampsiteDataSet();
//        $campsiteDataSet->check($_POST['emailAddress']);
//        {
//            echo "<script> alert ('Email address already exist' )</script>";
//        }
//    }
require_once('Views/register.phtml');