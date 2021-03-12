<?php

session_start();

$view = new stdClass();

require_once ('Models/Login2.php');
require_once('Views/register.phtml');

$email= $_POST['email'];
$password = $_POST['pass'];

if (isset($_POST['loginUser']))
{
    $login2 = new Login2();

    if (isset($_POST['email']) && isset($_POST['pass'])) {
        if ($login2->checkPassword($_POST['email'], $_POST['pass']) == true)
        {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['login'] = true;
            echo "<script> alert ('You have successfully logged in')</script>";
            echo "<script>location.href='/index.php'</script>";
        }
        else if($login2->checkEmail($_POST['email']) == false)
        {
            echo "<script> alert ('Email address does not exist, please sign up')</script>";
            echo "<script>location.href='/register.php'</script>";
        }

        else
            {
            if ($login2->checkPassword($_POST['email'], $_POST['pass']) == false)
            {
                echo "<script> alert ('Incorrect email address or password')</script>";
                echo "<script>location.href='/register.php'</script>";
            }
        }
    }
}