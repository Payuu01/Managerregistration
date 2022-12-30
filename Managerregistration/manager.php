<?php include('top_header.php');
require('connect.php');
 $sql = "SELECT * from product";

 if(isset($_POST["submit"])){

$name = $_POST['name'];

$sql = "INSERT INTO `managertbl`(`managerName`)  VALUES ('$name')";
//echo $sql;

 
mysqli_query($con, $sql);
 }

?>
<body class="cbp-spmenu-push">
    <div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

        <!--left-fixed -navigation-->
        <?php include('sidebar.php');?>

        <!--left-fixed -navigation-->
        
        <!-- header-starts -->
         <?php include('header.php');?>

        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <h2 class="title1">Add Manager</h2>
                    <div class="panel-body widget-shadow">
                     <form method="post" action="manager.php" enctype="multipart/form-data">
                        <div class="row" id="item_list">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter project name">
                              </div>
                            </div>
                        </div>

						            <center><input type="submit" name="submit" class="btn btn-primary" value="Upload"></center>
						          </form>
                    </div>
                </div>
            </div>
         </div>
          <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page" style="margin-top:-30%;">
                <div class="tables tbl">
                    <h2 class="title1">All Managers</h2>
                    <div class="panel-body widget-shadow">
                        <h4></h4>
                        <table class="table table-bordered">
                  <thead>
                       <tr>
                          <th>#</th>
                          <th>Manager Name</th>
                          <th>Delete</th>
		                </tr>
                  </thead>
               <tbody>
               <?php
require('connect.php');
$query="SELECT * FROM `managertbl`";
$data=mysqli_query($con, $query);
//$result= mysqli_fetch_assoc($data);
   $num = 1;
  while($result=mysqli_fetch_assoc($data))
    {
        $uid = $result['id'];
        
        echo"
        <tr>
        <td>".$num."</td>
        <td>".$result['managerName']."</td>
         <td><a href='deletemanager.php?user=$uid' class='btn btn-danger'>Delete</a></td>
        </tr>
        
        ";
        $num++;
    }
  ?>
       
</tbody>
</table>
</div>
</div>
</div>  
</div>
</body>
</html>
		

    <!--footer-->
	<?php include('footer.php');?>
	  <!--//footer-->
    </div>