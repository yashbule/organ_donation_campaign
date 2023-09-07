<?php
session_start();
include('connection.php');

extract($_POST);

 $result = "insert into signup(name,passwords,email,address,dob,phone,bloodgroup,gender) values('$name','$passwords','$email','$address','$dob','$phone','$bloodgroup','$gender')";
 $query_run=mysqli_query($con,$result);

 if($query_run)
{
      $_SESSION['status']   = "Registered Successfully";
      header("location: Userlogin.php");
}


//var_dump($result);
?>