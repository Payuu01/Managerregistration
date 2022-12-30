<?php
  require('connect.php');
  $userid = $_GET['project'];

  $sql = "select * from project where id = '$userid'";
  $res = mysqli_query($con, $sql);

  $usr = mysqli_fetch_assoc($res);
  $managerId = $usr['managerId'];
  $developerId = $usr['developerId'];

  $sql1 = "select * from managertbl where id = '$managerId'";
  $res1 = mysqli_query($con, $sql1); 
  $usr1 = mysqli_fetch_assoc($res1);


  $sql2 = "select * from developertbl where id = '$developerId'  ";
  $res2 = mysqli_query($con, $sql2); 
  $usr2 = mysqli_fetch_assoc($res2);

                                                                            
?>

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
                    <h2 class="title1">Edit record <span class="pull-right">
                        <a href="project.php" class="btn btn-info">All Project</a></span></h2>
                    <div class="panel-body widget-shadow">
                     <form method="post" action="updateproject.php">
                        <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Name</label>
                                          <input type="text" class="form-control" name="name" value="<?php echo $usr['name']?>">
                               </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $usr['id'] ?>">
                             

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Description</label>
                                    <input type="text" class="form-control" name="description" value="<?php echo $usr['description']?>">
                               </div>
                           </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label> Project Start Date</label>
                                    <input type="text" id="from" class="form-control" name="startdate" value="<?php echo $usr['startDate']?>">
                               </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label>Project Deadline</label>
                                          <input type="text" id="to" class="form-control" name="deadline" value="<?php echo $usr['deadline']?>">
                               </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                               <label>Project Manager</label>
                                    <select name="manager" id=""  class="form-control" Placeholder="Select manager name">
                                    <option value="">Select Manager</option>
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
        
              
</body>
</html>
