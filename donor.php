<?php
session_start();
include('connection.php');
if(!isset($_SESSION['userdata']))
 {
    header("location: userlogin.php");
 }

$userdata=$_SESSION['userdata'];
//var_dump($userdata);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
          * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            
        }
        
        body {
            margin-bottom: 200px;
        }
        
        .nav {
            text-align: center;
            background: burlywood;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        
        .logo {
            position: relative;
            left: 40px;
        }
        
        .logo1 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: large;
            font-weight: 300;
            color: rgb(44, 83, 190);
            position: relative;
            left: 60px;
        }
        
        .text {
            font-size: medium;
            font-family: sans-serif;
            text-indent: 30px;
            color: rgb(29, 29, 177);
            font-weight: 300;
        }
        
        .text a {
            color: #2691d9;
            text-decoration: none;
        }
        
        .text a :hover {
            text-decoration: underline;
        }
        .success {
    margin: 0% 20%;
    
    font-size: 45px;
    text-align: center;
    background-color: #2bb02b70;
    border-radius: 10px;
}
        
        .child{
            border: 5px solid black;
            float: left;
            width: 50%;
            border-radius: 40px;
            margin-left: 40px;
            margin-right: 10px;
            padding-bottom: 20px;
           
           
        }
        .parent{
            display: flex;
        }
        .logout{
                position: fixed;
                right: 10px;
                top:5px;
        }
    </style>
</head>

<body>
    <div class="nav">
        <h1>Organ Donation Campaign</h1>
        <!-- LOGOUT Button  -->
        <a href="userlogout.php">
        <button class="logout" >LOG OUT</button>
        </a>
    </div>
    <div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>

    <div class="logo1">
        <hr width="190px">organdonarcamp.gov
        <hr width="190px">
    </div><br>
    <div class="text"> 
    <div class="success">
        
        <?php
           if(isset($_SESSION['status1']))
        {
          
          ?>
          <div class="alert alert-success" role="alert">
    <h4 class="alert-heading"><?php echo $_SESSION['status1']; ?> </h4>
    <hr>
    
    </div>
          <?php
          unset($_SESSION['status1']);
        }
         ?>
      </div><br><br>
    <center>    <div class="container"><h2>Please choose the required option..</h2></div><br></center>
    <section class="parent">
    <section class="child">
    <a href="organ_donor.php"><img src="Img/img7.png" alt="" height="170px"></a>
    <a href="organ_donor.php"> <h2>Organ Donar</h2></a>
        <p>You are able to donate some organs while you are alive, for example; a kidney, or part</p><p> of your liver However, most organ and tissue donations will come from people who</p><p> have died.</p></section>

    <section class="child">
    <a href="organ_seeker.php"><img src="Img/img8.jfif" alt="" height="170px"> </a>
    <a href="organ_seeker.php"><h2>Organ Seeker</h2></a><p>Organs and/or tissues that are transplanted within the same person's body are called </p> <p> autografts. Transplants that are recently performed between two subjects of the same</p><p> species   are called allografts</p>
    </section>


</body>

</html>