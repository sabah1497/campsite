<?php

session_start();
$view = new stdClass();

require_once ('Models/Users.php');
require_once ('Models/Login2.php');


if (isset($_POST['loginUser'])) {
    $users = new Users();

    {
        if ($users->checkAdmin($_POST['$ID']) == true) {
            $_SESSION['login'] = true;
            $_SESSION['admin']=true;
            echo "<script> alert ('You have successfully logged in as admin')</script>";
//            echo "<script>location.href='/campsiteISv1.php'</script>";
        }
//        else if ($users->checkAdmin() == false) {
//            echo "<script> alert ('You are not a user')</script>";
//            echo "<script>location.href='/register.php'</script>";
//        }
    }
}

if (isset($_POST['add'])) {

    $users = new Users();
    $users->addCampsite($_POST['nameID'],$_POST['address'],$_POST['contactDetails'],$_POST['openingDates'],$_POST['visitorRating']);
    echo "<script> alert ('You have successfully added a campsite')</script>";
    echo "<script>location.href='/campsiteISv1.php'</script>";
}

require_once('Views/admin.phtml');