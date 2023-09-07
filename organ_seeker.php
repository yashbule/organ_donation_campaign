<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include('connection.php');
if(!isset($_SESSION['userdata']))
 {
    header("location: userlogin.php");
 }

$userdata=$_SESSION['userdata'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker</title>

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


    <div class="nav"><h1>Organ Donation Campaign</h1>
    <!-- LOGOUT Button  -->
    <a href="userlogout.php">
        <button class="logout" >LOG OUT</button>
        </a>
    </div>
    <div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
    
    <div class="logo1"><left><hr width="190px">organdonarcamp.gov<hr width="190px" ></div>
    <br>
   
    <div class="text"> <a href="donor.php">Back to Donor</a>       
                          
    </div>
       
  <div class="container1">
  <center>
      
  <h3>Search Organ for  <strong>Organ Seeker</strong></h3><br>
      <div class="form-block">    
  <form action="" method="POST">
        <div>
        &emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;&emsp;&emsp;&ensp;<label>Blood Group<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
          <label>Organ</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
          <br>
          <!-- <input types="text" class="form-control" name="blood_group" value="<?php// if(isset($_GET['blood_group'])) ?>"  id="blood_group" >  -->
          <select types="select"  class="form-control" class="selects required" name="blood_group" id="blood_group">
                 <option value="">---Select---</option>
                 <option value="A+">A<sup>+</sup></option>
                 <option value="A-">A<sup>-</sup></option>
                 <option value="B+">B<sup>+</sup></option>
                 <option value="B-">B<sup>-</sup></option>
                 <option value="AB+">AB<sup>+</sup></option>
                 <option value="AB-">AB<sup>-</sup></option>
                 <option value="O+">O<sup>+</sup></option>
                 <option value="O-">O<sup>-</sup></option>
               </select> 
          

          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

          <select types="select"  class="form-control" class="selects required" name="organ" id="organ">
            <option value="">---Select---</option>
            <option value="Corneas_eyes">Corneas (Eyes)</option>
            <option value="Kidney">Kidneys</option>
            <option value="Bone_Marrow">Bone Marrow</option>
            <option value="Lungs">Lungs</option>
            <option value="Liver">Liver</option>
            <option value="Pancreas">Pancreas</option>
            <option value="Intestine">Intestine</option>
            <option value="Skin">Skin</option>
            <option value="Body_Tissues">Body Tissues</option>
          </select>

        <br><br><br>

              <input type="submit" value="Submit" >
                     
                      <!-- <a href="organ_seeker.php?blood_group=<?php// echo $_GET['blood_group']; ?>">
                         <input type="button" value="Search">
                      </a> -->
        </div>
</form>
        </center>
      </div>

      
<br>
<br>
<center>
<div class="container1">
    
<?php 

//if(isset())
     {
        //SELECT CustomerName,City FROM Customers;*/
 ?>       
    <table border="1" cell_padding="3">
    <thead>
        <tr>
            
        
           <th>Sr No.</th>
           <th>Name</th>
           <!-- <th>Address</th> -->
           <th>District</th>
           <th>state</th>
           <!-- <th>Pin Code</th> -->
           <th>Mobile Number</th>
           <!-- <th>Occupation</th> -->
           <!-- <th>E-mail</th> -->
           <th>Date Of Birth</th>
           <th>Gender</th>
           <th>Blood Group</th>
           <!-- <th>Aadhar Card Number</th> -->
           <th>Organ</th>
           <!-- <th>Action</th> -->

           
        </tr>
    </thead>
    <tbody>
    <?php  $j = 1;  ?>     
     <div>
     
     
     
        <?php
        
       // $blood_group = $_POST["blood_group"];
        //$organ = $_POST["organ"];
        
            extract($_POST);
            //global $blood_group;
            $blood_group = $_POST["blood_group"];
            //$organ = $_POST["organ"];
            //$name = $_POST["name"];
            
        

        $result=$con->query("select id,name,district,state,phone,dob,gender,blood_group,organ from donor where blood_group = '$blood_group' ");
            
        while($row=$result->fetch_array())
        { 
           
        ?>
       <tr>
       
           <!-- <td> 
               <a target="_blank" download herf="image/<?php// echo $row['image_name'];?>" > 
               <img src="image/<?php// echo $row['image_name'];?>"/>
            </td> -->
          
           <td><?php echo $j;?></td>
           <td><?php echo $row['name'];?></td>
                                             <!-- <td><?php //echo $row['current_address'];?></td> -->
           <td><?php echo $row['district'];?></td>
           <td><?php echo $row['state'];?></td>
                                             <!-- <td><?php //echo $row['pin_code'];?></td> -->
           <td><?php echo $row['phone'];?></td>
                                             <!-- <td><?php //echo $row['occupation'];?></td> -->
                                             <!-- <td><?php //echo $row['email'];?></td> -->
           <td><?php echo $row['dob'];?></td>
           <td><?php echo $row['gender'];?></td>
           <td><?php echo $row['blood_group'];?></td>
                                             <!-- <td><?php //echo $row['aadhar_no'];?></td> -->
           <td><?php echo $row['organ'];?></td>
          
          

 
       </tr>
        <?php
        
       // var_dump($result);
       $j++;}
        
        ?>
    </div>
    </tbody>
    </table>
<?php
    }
    

?>

</div>
</center>





  </div>
   </body>
</html>