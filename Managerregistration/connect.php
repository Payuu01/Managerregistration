<?php

$user = 'root';
$pass = '';
$db = 'manager_registration';

$con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
 
if($con)
{
  //echo"connect successful!!";
}
else{
    echo"connection failed!!"; 
}
?>