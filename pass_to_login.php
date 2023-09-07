<?php 

//start session
session_start();

// remove all session variable
session_unset();

//khatam sab khatam
session_destroy();

//chalo bhai waps Login page pr
header('location: Userlogin.php');

?>