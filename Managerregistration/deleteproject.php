<?php
require('connect.php');
  $userid = $_GET['project'];

  $sql = "delete from project where id='$userid'";
 //echo $sql;
  mysqli_query($con, $sql);

   header('location:project.php');
?>