

<?php
session_start();
require('connect.php');

$msg='';
if(isset($_POST['submit'])){
	$time=time()- 20;
	$ip_address=getIpAddr();
	$check_login_row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total_count from login_log where try_time>$time and ip_address='$ip_address'"));
	$total_count=$check_login_row['total_count'];
	if($total_count==1){
		$msg="To many failed login attempts. Please login after 20 sec";
	}else{
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$sql="select * from usertable where email='$username' and  password='$password'";
		$res=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($res)){
			$row = mysqli_fetch_assoc($res);
		    $_SESSION['id']= $row['id'];
			$_SESSION['admin_login']='yes';
			mysqli_query($con,"delete from login_log where ip_address='$ip_address'");
			?>
			<script>
				window.location.href='index.php';
			</script>
			<?php
		}else{
			$rem_attm=1-$total_count;
			if($rem_attm==0){
				$msg="To many failed login attempts. Please login after 20 sec";
			}else{
				//$msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
			}
			$try_time=time();
			mysqli_query($con,"insert into login_log(ip_address,try_time) values('$ip_address','$try_time')");
			
		}
	}

$time1=time()-40;
	$check_login_row1=mysqli_fetch_assoc(mysqli_query($con,"select count(*)
     as total_count from login_log where try_time>$time1 and ip_address='$ip_address'"));
	$total_count1=$check_login_row1['total_count'];

    if($total_count1==2){
		$msg="To many failed login attempts. Please losssgin after 40 sec";
	}else{
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$sql="select * from usertable where email='$username' and  password='$password'";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)){
			$_SESSION['admin_login']='yes';
			mysqli_query($con,"delete from login_log where ip_address='$ip_address'");
			?>
			<script>
				window.location.href='index.php';
			</script>
			<?php
		}else{
			
			$rem_attm1=2-$total_count1;
			if($rem_attm1 == 0){
				$msg="To many failed login attempts. Please login after 40 sec";
			}else{
				//$msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
			}
			$try_time1=$total_count1;
			mysqli_query($con,"insert into login_log(ip_address,try_time) values('$ip_address','$try_time1')");
			
		}
	}


	$time2=time()-60;
	$check_login_row2=mysqli_fetch_assoc(mysqli_query($con,"select count(*)
    as total_count from login_log where try_time>$time2 and ip_address='$ip_address'"));
	$total_count2=$check_login_row2['total_count'];

    if($total_count2==3){
		$msg="To many failed login attempts. Please losssgin after 60 sec";
	}else{
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$sql="select * from usertable where email='$username' and  password='$password'";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)){
			$_SESSION['admin_login']='yes';
			mysqli_query($con,"delete from login_log where ip_address='$ip_address'");
			?>
			<script>
				window.location.href='index.php';
			</script>
			<?php
		}else{
			
			$rem_attm2=3-$total_count2;
			if($rem_attm2 == 0){
				$msg="To many failed login attempts. Please login after 60 sec";
			}else{
				//$msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
			}
			$try_time2=$total_count2;
			mysqli_query($con,"insert into login_log(ip_address,try_time) values('$ip_address','$try_time2')");
			
		}
	}

}



function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
       $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
   return $ipAddr;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    
    
</head>
 <style>
    
    body{
	margin: 0 auto;
	background-image: url(images/bg.jpg);
	background-repeat: no-repeat;
	background-size: 100% ;
}

.container{
	width: 500px;
	height: 450px;
	text-align: center;
	margin: 0 auto;
	background-color: white;
	margin-top: 160px;
    border-radius:20px;
}

.head{
	text-align: center;
    padding: 1em;
    background: #629aa9;
    border-bottom: 10px solid #4b7884;
    margin: 0;
    color: #fff;
    font-size: 1.6em;
} 

.container img{
	width: 150px;
	height: 150px;
	margin-top: -60px;
}

input[type="text"],input[type="password"]{
	margin-top: 30px;
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 40px;
}

.form-input::before{
	content: "\f007";
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 25px;
	position: absolute;
	font-size: 35px;
	color: #71b7e6; 
}

.form-input:nth-child(2)::before{
	content: "\f023";
}

.btn-login{
	padding: 15px 25px;
	border: none;
	background: linear-gradient(135deg, #71b7e6, #9b59b6);
	color: #fff;
    border-radius:20px;
    width:65%;
}
a{
    font-family: Poppins-Regular;
    font-size: 17px;
    line-height: 1.7;
    color: #666666;
    margin: 0px;
    transition: all 0.4s;
    -webkit-transition: all 0.4s;
    text-decoration:none;
    align-items: right;
}

.footer p {
    color: #7A7676;
    font-size: 1em;
    line-height: 1.6em;
}

.footer {
    background: #fff;
    padding: 1em;
    width: 100%;
    text-align: center;
    box-shadow: 0px -1px 4px rgb(0 0 0 / 21%);
    -webkit-box-shadow: 0px -1px 4px rgb(0 0 0 / 21%);
    -moz-box-shadow: 0px -1px 4px rgba(0, 0, 0, 0.21);
    -ms-box-shadow: 0px -1px 4px rgba(0, 0, 0, 0.21);
    -o-box-shadow: 0px -1px 4px rgba(0, 0, 0, 0.21);
}

#page-wrapper {
    padding: 0em -1em 2.5em; 
    margin-top: 60px;
    background-color: #F1F1F1;
}

#result{
    color:red;
}
.login-link{
	margin-top: 10px;
}
</style> 

<body>
	<div class="container">
       <h1 class="text-center head">Login</h1><br>
       <form action="#" method="post">
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter the E-mail" required>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password" required>
			</div>
            <div class="text-right">
                <a href="forgot/forgot-password.php">Forget Password</a>
            </div>
			<input type="submit" name="submit" value="LOGIN" class="btn-login">
			<div class="link login-link text-center">Not yet a member? <a href="forgot/signup-user.php">Signup now</a></div>
            <div id="result"><?php echo $msg?></div>		
		</form>

        
	</div>

    <div id="page-wrapper">
        <!--footer-->
        <div class="footer">
	     <p>&copy;All rights reserved | Design by <a href="" target="_blank">Payal</a></p>		
	    </div>
	
	    <!--//footer-->
    </div>
</body>
</html>
    
