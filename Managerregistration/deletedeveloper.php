<?php
require('connect.php');
  $userid = $_GET['user'];

  $sql = "delete from developertbl where id='$userid'";
 //echo $sql;
  mysqli_query($con, $sql);

   header('location:developer.php');
?>