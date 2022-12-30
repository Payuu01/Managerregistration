<?php 

session_start();
 require('connect.php');


if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from usertable where email='".$uname."'AND password='".$password."' limit 1";
    
    $res=mysqli_query($con, $sql);

    $numrows = mysqli_num_rows($res);
    echo $numrows;
    
    if($numrows>=1){
        $data = mysqli_fetch_assoc($res);
        $_SESSION['id']=$data['id'];
        $_SESSION['username']=$data['username'];
         $_SESSION['admin_login']=1;
         header('location:index.php');
    }
     else{
         header('location:login.php?error=1');
     }
    
        
}
?>



