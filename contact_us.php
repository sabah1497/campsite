<?php
require_once ('Models/Database.php');
require_once('Models/CampsiteDataSet.php');

$view = new stdClass();


        if(isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $password = md5($password); //de-hashing
            $studentsDataSet = new CampsiteDataSet();
            $studentsDataSet->login($_POST['emailAddress'], $_POST['password']);

            $statement->execute();
            $data = $statement->fetch();
            if ($data['email'] != $emailAddress and $data['pass'] != $password) {
                echo "Invalid email or password";
            } else

                if ($data['email'] == $emailAddress and $data['pass'] == $password) {
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['name'] = $data['name'];
                    header("location:profile.php");
                }
        }


//catch (PDOException $e)
//{
//
//    echo "error".$e->getMessage();
//}



//DONT THINK I NEED THIS PAGE!!!!!!