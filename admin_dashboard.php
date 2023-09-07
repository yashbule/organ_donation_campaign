<?php
session_start();
include('connection.php');
if(!isset($_SESSION['admindata']))
 {
    header("location: adminlogin.php");
 }

$admindata=$_SESSION['admindata'];
//var_dump($userdata);


if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $result=$con->query("delete from signup where id='$id'");
 // var_dump($result);
}
// if(isset($_GET['ids']))
// {
//   $ids = $_GET['ids'];
//   $result1=$con->query("delete from donor where ids='$ids'");
//  var_dump($result1);
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <style>
      *{
         box-sizing: border-box;
         padding: 0;
         margin: 0;
     }
     body{
          margin-bottom: 20px;
         }

         .col-md-12 {
    background: #be838385;
    border-radius: 10px;
    padding-bottom: 16px;
    margin-right: 95px;
    padding-left: 10px;
}   
  .container1{
              background: #fff;
              padding: 40px;
              max-width: 85%;
              margin: auto;
              -webkit-box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.2);
              box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.2);
           }
           .container11{
              background: #fff;
              padding: 40px;
              max-width: 90%;
              margin: auto;
              -webkit-box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.2);
              box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.2);
           }       

  .form-control {
                   border: none;
                   border-radius: 10px;
                   padding-inline: 7px;
                   height: 40px;
                   width: 340x;
                   background: #efefef;
                }
    .form{
          b
          }     
     .nav{
         text-align: center;
         background-color: rgb(63, 106, 186);
         padding-top: 5px;
         padding-bottom: 5px;
     }
     .logo{
 
        position: relative; left: 40px;
     }
     .logo1{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: large;
        font-weight: 300;
        color:rgb(44, 83, 190);
        position: relative; left: 60px;
   }
   .text{
       font-size: medium; font-family: sans-serif;
       text-indent: 30px;
       color: rgb(29, 29, 177);
       font-weight: 300;
       word-spacing: 20px;
   }
   .center{
       position: absolute;
       top: 80%;
       left: 50%;
       transform: translate(-50%, -50%);
       width: 600px;
       background: white;
       border-radius: 10px;
   }
   .center h1{
       text-align: center;
       padding: 0 0 20px 0;
       border-bottom: 1px solid silver;
   }
   .center form{
       padding: 0 40px;
       box-sizing: border-box;
     
   }
   form .txt-fld{
     position: relative;
     border-bottom: 2px solid #adadad;
     margin: 30px 0;
   }
      .txt-fld input{
       width: 100%;
       padding: 0 5px;
       height: 40px;
       font-size: 16px;
       border: none;
       background: none;
       outline: none;
     }
     .txt-fld label{
         position: absolute;
         top: 50%;
         left: 5px;
         color: #adadad;
         transform: translateY(-50%);
         font-size: 16px;
         pointer-events: none;
         transition: .5s;
     }
      .txt-fld span::before{
         content: '';
         position: absolute;
         top: 40px;
         left: 0;
         width: 0%;
         height: 2px;
         background: #2691d9;
         transition: .5s;
     }
     .txt-fld input:focus ~ label,
     .txt-fld input:valid ~ label{
         top: -5px;
         color: #2691d9;

     } 
     .txt-fld input:focus ~ span::before,
     .txt-fld input:valid ~ span::before{
         width: 100%;

     }
     .pass{
         margin: -5px 0 20px 5px;
         color: #a6a6a6;
         cursor: pointer;
     }
     .pass:hover{
         text-decoration: underline;
     }
     input[type="submit"]
     {
         width: 100%;
         height: 50px;
         border: 1px solid;
         background: #2691d9;
         border-radius: 20px;
         font-size: 18px;
         color: #e9f4fb;
         font-weight: 700;
         cursor: pointer;
         outline: none;            
     }
     input[type="submit"]:hover
     {
         border-color: #2691d9;
         transition: .5s;
     }
     .logout{
                position: fixed;
                right: 10px;
                top:5px;
        }
     span{
      color:red;
     }  
     .or6 {
    float: right;
    width: 750px;
    margin-top: -18px;
    margin-right: -22px;
}
td{
    padding: 2px 6px;
}
 </style>
    
</head>
<body>
<center>
         <!-- LOGOUT Button  -->
        <a href="adminlogout.php">
        <button class="logout" >LOG OUT</button>
        </a>
<h1> <?php echo $admindata['admin_name']; ?> - Panel </h1>


<br>
<br>
<div class="container1">
    <table border="1" cell_padding="3">
        <thead>
            <tr>
                
               <th>Sr No.</th>
               <th>Name</th>
               <th>Password</th>
               <th>Address</th>
               <th>Blood Group</th>
               <th>DOB</th>
               <th>Gender</th>
               <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
    
        <?php  $i = 1;  ?>
            <div>
                   <?php
               $result=$con->query("select * from signup");
               
               while($row=$result->fetch_array())
               {
               ?>
              <tr>
                  <!-- <td> 
                      <a target="_blank" download herf="image/<?php echo $row['image_name'];?>" > 
                      <img src="image/<?php echo $row['image_name'];?>"/>
                   </td> -->
                 
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['passwords'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['bloodgroup'];?></td>
                  <td><?php echo $row['dob'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td>
                      <a href="admin_dashboard.php?id=<?php echo $row['id']; ?>">
                         <input type="button" value="DELETE">
                      </a>
                      
                      <a href="admin_update.php?id=<?php echo $row['id'];?>">
                          <input type="button" value="UPDATE">
                      </a>
                      
                      
                  </td>

 
                </tr>
                 <?php
                 $i++;}
                 ?>

            </div>
         </tbody>
         </table>
         <br><br>
         <a href="admin_donor_detail.php">
                  <input type="button" value="Donor Details">
               </a>
    </div>

    <br><br>
    <br><br>


    
</div>
<center>
</body>
</html>