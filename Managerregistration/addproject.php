<?php include('top_header.php');
require('connect.php');
 $sql = "SELECT * from product";

 if(isset($_POST["submit"])){

$projectname = $_POST['name'];
$projectdesc = $_POST['description'];
$startdate = $_POST['startdate'];
$deadline = $_POST['deadline'];
$manager = $_POST['manager'];
$developer = $_POST['developer'];


//print_r($_FILES);

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
$filename = $_FILES["myfile"]["name"];
$img_des = "upload/".$filename;
move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);


$sql = "INSERT INTO `project`(`name`, `description`, `prototype`, `startDate`, `deadline`, `managerId`, `developerId`)  VALUES ('$projectname','$projectdesc','$img_des','$startdate','$deadline','$manager','$developer')";
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
                <div class="tables" >
                    <h2 class="title1">Add Project <span class="pull-right">
                        <a href="project.php" class="btn btn-info">All Project</a></span></h2>
                    <div class="panel-body widget-shadow">
                     <form method="post" action="addproject.php" enctype="multipart/form-data">
                     	<div class="row" id="item_list">
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Name</label>
						                  <input type="text" class="form-control" name="name" placeholder="Enter project name">
                               </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Prototype</label>
                                    <input type="file" class="form-control" name="myfile" placeholder="Upload document" accept="application/pdf">
                               </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Description</label>
						                <input type="text" class="form-control" name="description" placeholder="Project description"> 
                               </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Start Date</label>
                                        <input type="text" id="from" class="form-control" name="startdate" placeholder="Choose start date">
                                 
                               </div>
                            </div>

                           <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Deadline</label>
                                          <input type="text" id="to"  class="form-control" name="deadline" placeholder="Choose deadline">
                               </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Manager</label>
                                    <select name="manager" id=""  class="form-control" Placeholder="Select manager name">
                                    <option value="">Select manager name</option>
                                    <?php
                                      $query=mysqli_query($con,"select * from managertbl");
                                        while($row = mysqli_fetch_assoc($query))
                                        {
                                        ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['managerName'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                          
                               </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Developer</label>
                                    <select name="developer" id=""  class="form-control" Placeholder="Select developer">
                                    <option value="">Select developer</option>
                                    <?php
                                      $query=mysqli_query($con,"select * from developertbl");
                                        while($row = mysqli_fetch_assoc($query))
                                        {
                                        ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['developerName'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                               </div>
                            </div>
                        </div>
						<center><input type="submit" name="submit" class="btn btn-primary" value="Upload"></center>
					 </form>    
                    </div>

                </div>
            </div>
         </div>

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

    <!--footer-->
	<?php include('footer.php');?>
	  <!--//footer-->
    </div>