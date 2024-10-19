<?php
session_start();
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $sql="Select * from `data` where username='$username' and password='$password'";
        $result=mysqli_query($con,$sql);
        if($result){
            $num=mysqli_num_rows($result);
            if ($num>0){//if data already present then only success login
//echo"login successful";
$login=1;
$_SESSION['username']=$username;
header('location:welcome.php');
            }
            else{
               // echo"Invalid credentials";//i.e 0 which means data is not present in database
               $invalid=1;
            }
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOgin page</title>
</head>
<body>
    <?php
    if($login){
        echo"<div class='alert alert-success' role='alert'>
 Login successfully
</div>";
    }
    else{
        if($invalid){
            echo"<div class='alert alert-danger' role='alert'>
        Invalid credentials
           </div>";

        }
        
        }
    
    ?>
</body>
</html>