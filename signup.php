<?php
$user=0;//it means false by default
$success=0;
$match=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'connect.php';
if (isset($_POST['signup'])){
    $username=$_POST['username'];
    
    $password=md5($_POST['password']);//to encrypt password use md5()
    $cpassword=md5($_POST['cpassword']);
   // $sql="insert into `data`(username ,password)values('$username','$password')";
   // $result=mysqli_query($con,$sql);
    //if($result){
      //  echo"Data inserted sucessfully";

    //}
    //else{
      //  die(mysqli_error($con));
    //}


    $sql="Select * from `data` where username='$username'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
       // echo $num;
       if($num>0){//user name must not repeated
       // echo"user already exist";
$user=1;//it means true
       }
       else{
        if($password===$cpassword){//password and confirm passwod must match
            $sql="insert into `data`(username,password)values('$username','$password')";
        $result=mysqli_query($con,$sql);
        if($result){
            //echo"signup successfull";
            $success=1;
        }}else{
        
       // echo"Password didn't match";
       $match=1;
            
        }
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
    <title>signup page</title>
</head>
<body>
    <?php
    if($user){
        echo"<div class='alert alert-danger' role='alert'>
 User already exist
</div>";
    }
    else{
        if($success){
            echo"<div class='alert alert-success' role='alert'>
            Signup successful
           </div>";

        }
        else{
            if($match){ echo"<div class='alert alert-danger' role='alert'>
                password didn't match
               </div>";
    

            }
        }
    }
    ?>
</body>
</html>