<?php
$con=new mysqli("localhost",'root','','organ');
if($con->connect_error)
{
    echo "Connection failed";
}
//echo "Connection Successfully Established";
?>