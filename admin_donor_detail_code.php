<?php
include('connection.php');

extract($_POST);

//$id = $_GET['id'];

$result=$con->query("update donor set name='$name',current_address='$current_address',district='$district', state='$state',pin_code='$pin_code',phone='$phone',email='$email',dob='$dob' ,gender='$gender' ,blood_group='$blood_group' ,aadhar_no='$aadhar_no' where id='$id' ");

var_dump($result);
header("location: admin_donor_detail.php");

?>