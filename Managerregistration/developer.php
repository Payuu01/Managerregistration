<?php include('top_header.php');
require('connect.php');
 $sql = "SELECT * from product";

if(isset($_POST["submit"])){

    $name = $_POST['name'];
    
    $sql = "INSERT INTO `developertbl`(`developerName`)  VALUES ('$name')";
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
                    <h2 class="title1">Add Developer <span class="pull-right"></span></h2>
                    <div class="panel-body widget-shadow">
                        <form method="post" action="developer.php" enctype="multipart/form-data">
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
                <div class="tables">
                    <h2 class="title1">All Developers</h2>
                    <div class="panel-body widget-shadow">
                        <h4></h4>
                        <table class="table table-bordered">
                  <thead>
                       <tr>
                          <th>#</th>
                          <th>Developer Name</th>
                          <th>Delete</th>
		                </tr>
                  </thead>
               <tbody>
               <?php
require('connect.php');
$query="SELECT * FROM `developertbl`";
$data=mysqli_query($con, $query);
//$result= mysqli_fetch_assoc($data);
   $num = 1;
  while($result=mysqli_fetch_assoc($data))
    {
        $uid = $result['id'];
        
        echo"
        <tr>
        <td>".$num."</td>
        <td>".$result['developerName']."</td>
       <td><a href='deletedeveloper.php?user=$uid' class='btn btn-danger'>Delete</a></td>
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

    </div>    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat:"dd/mm/yy",
          
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat:"dd/mm/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
</script>
		
	<?php include('top_footer.php');?>

    <!--footer-->
	<?php include('footer.php');?>
	  <!--//footer-->
    </div>