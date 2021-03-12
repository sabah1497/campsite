<?php
session_start();
if(empty($_SESSION['email']))
{
    header ("location:contact_us.php");
}
echo $_SESSION['name'];
echo " you have signed in.";
?>
<!--<button type="button" class="btn btn-dark"><a href="logout.php"> Logout</a></button>-->

