<?php
include('connection.php');

extract($_POST);

// $id = $_GET['id'];

$result=$con->query("update signup set name='$name',passwords='$passwords',email='$email',address='$address',dob='$dob',phone='$phone',bloodgroup='$bloodgroup',gender='$gender' where id='$id' ");
//aadhar_no='$aadhar_no'
//var_dump($result);
header("location: admin_dashboard.php");

?>