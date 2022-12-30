<?php
require('connect.php');
  $userid = $_GET['user'];

  $sql = "delete from managertbl where id='$userid'";
   //echo $sql;
  mysqli_query($con, $sql);

   header('location:manager.php');
?>