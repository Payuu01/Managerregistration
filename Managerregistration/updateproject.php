<?php
 require('connect.php');
    $name = $_POST['name'];
    $description = $_POST['description'];
    $startdate = $_POST['startdate'];
    $deadline = $_POST['deadline'];
    $manager = $_POST['manager'];
    $developer = $_POST['developer'];

     
  

  $sql = "UPDATE `project` SET `name`='$name',`description`='$description',`startDate`='$startdate',`deadline`='$deadline',`managerId`='$manager',`developerId`='$developer'";
  //echo $sql;
  mysqli_query($con, $sql);

  header('location:project.php');
?>