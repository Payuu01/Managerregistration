<?php include('top_header.php');?>
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
                    <h2 class="title1">Project Detail <span class="pull-right">
                    <a href="addproject.php" class="btn btn-info">Add New</a></span></h2>
                    <div class="panel-body widget-shadow">
                        <h4></h4>
                <table class="table table-bordered">
                  <thead>
                       <tr>
                          <th>#</th>
                          <th>Project Name</th>
                          <th>Description</th>
                          <th>Prototype</th>
                          <th>Start Date</th>
                          <th>Deadline</th>
                          <th>Manager</th>
                          <th>Developer</th>
                          <th>Edit</th>
                          <th>Delete</th>
		                </tr>
                  </thead>
               <tbody>
                
               <?php
require('connect.php');
$query="SELECT * FROM project t1 inner join managertbl t2 on t1.managerId=t2.id inner join developertbl t3 on t1.developerId=t3.id ";

$data=mysqli_query($con, $query);
//$result= mysqli_fetch_assoc($data);
   $num = 1;
  while($result=mysqli_fetch_assoc($data))
    {
        $uid = $result['id'];
        
        echo"
        <tr>
        <td>".$num ."</td>
        <td>".$result['name']."</td>
        <td>".$result['description']."</td>
        <td><center><a href='".$result['prototype']."'><i class='fa fa-file'></i></a></center></td>
        <td>".$result['startDate']."</td>
        <td>".$result['deadline']."</td>
        <td>".$result['managerName']."</td>
        <td>".$result['developerName']."</td>
        <td><a href='editproject.php?project=$uid'class='btn btn-primary'>Edit</a> </td>
         <td><a href='deleteproject.php?project=$uid' class='btn btn-danger'>Delete</a></td>
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
		$('.table').DataTable();
  });
</script>

<!--footer-->
<?php include('footer.php');?>
	  <!--//footer-->
    </div>
		
	<?php include('top_footer.php');?>

