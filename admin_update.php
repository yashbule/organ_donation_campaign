<?php
session_start();
include('connection.php');
if(!isset($_SESSION['admindata']))
 {
    header("location: adminlogin.php");
 }

$admindata=$_SESSION['admindata'];
//var_dump($userdata);

$id = $_GET['id'];

$result=$con->query("select * from signup where id='$id' ");

$data=$result->fetch_array();
//var_dump($data);
// if(isset($_POST['submit']))
// {
//     extract($_POST);
//     $result=$con->query("update signup set name='$name',passwords='$passwords',email='$email',address='$address',bloodgroup='$bloodgroup',dob='$dob',phone='$phone',gender='$gender' where id='$id' ");
//     header("location: admin_dashboard.php");
// }   
 

// var_dump($result);

?>
<script type="text/javascript">


       //Name VAlidation
        document.getElementById('name').onkeypress=function(e)
        {
    if(!(/[A-Za-z\s ]/i.test(String.fromCharCode(e.keyCode)))) {
        e.preventDefault();
        return false;
    }
        }


      //Email VAlidation
        function checkEmail(email)
        {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(email))
    alert("Please enter a valid email ID . . Example: xyz@abc.com");
        }

        //Mobile Number VAlidation
        function myFunction()
         {
             const message = document.getElementById("mobileError");
             message.innerHTML = "";
             let x = document.getElementById("mobile").value;
                try 
                { 
                  if(x == "")  throw "Blank , Enter 10 Digit Mobile Number";
                  if(isNaN(x)) throw "not a Number , Enter 10 Digit Mobile Number eg. 9845612382";
                  x = Number(x);
                  if(x < 1000000000)  throw "not proper , Enter 10 Digit Mobile Number";
                  //if(x > 10)   throw "too high";
                }
             catch(err) {
               message.innerHTML = "Input is " + err;
             }
          }
     
      //Password VAlidation
   function Password() 
    {

      var a = document.getElementById("passwords").value;
      
      if (a.length<6){
                alert ("Password is not less than 6 Characters");
                return false;
             }
     
    }  


   function CheckPassword() 
    {

      var a = document.getElementById("passwords").value;
      var b = document.getElementById("confirm_password").value;
      if(a!=b)
     { 
        alert("Password is not Matched");
            return false;
     }
    }  


   
                      
</script>



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
          background: rgb(241 236 236 / 55%);
          border-radius: 10px;
          padding-bottom: 10px;
          padding-top: 10px;
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
       top: 55%;
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
    width: 775px;
    margin-top: -58px;
    margin-right: -22px;
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



<div class="">
    
    <div class="center">
        
        <h1>Admin Update Panel </h1>
        <form action="admin_update_code.php" method="post" >

        <input type="hidden" name="id" value="<?php echo $data['id']; ?> ">

            <div class="txt-fld">
                <input type="text"  onkeypress="return /[A-Za-z\s]/i.test(event.key)" maxlength="50"  id="name"  name="name" value="<?php echo $data['name']; ?>" required>
                <span></span>
                <label>Enter Name</label>
            </div>
            <div class="txt-fld">
                <input type="text" name="passwords" onblur="CheckPassword()" id="passwords" value="<?php echo $data['passwords']; ?>" required>
                <span></span>
                <label>Enter Password</label>
            </div>
            
            <div class="txt-fld">
                 <input type="email" name="email" id="email"  onblur="checkEmail(this.value)"  value="<?php echo $data['email']; ?> "required>
                 <span></span>
                 <label>Enter E-mail</label>
             </div>
            <div class="txt-fld">
                 <input type="text" name="address" id="address" value="<?php echo $data['address']; ?> "required>
                 <span></span>
                 <label>Enter Address</label>
             </div>
            
             <div class="txt-fld">
                 <input type="date" class="date"name="dob" min="1940-01-01" max="2022-07-23" value="<?php echo $data['dob']; ?>" required>
                 <span></span>
                 <label></label>
              </div>
              <div class="txt-fld">
                 <input type="text" name="phone"  id="mobile" onblur="myFunction()"  maxlength="10" value="<?php echo $data['phone']; ?>"required>
                 <p id="mobileError" ></p>
                 <label>Enter Mobile no.</label>
               </div>
               <div>
                   <!-- <label>Blood Group<span>*</span></label> -->
                   <select types="select"  class="form-control" value="<?php echo $data['bloodgroup']; ?>" class="selects required" name="bloodgroup" id="bloodgroup">
                 <option value="">---Select---</option>
                 <option value="A+" <?php echo $data['bloodgroup']=="A+"?"selected":'';?>>A<sup>+</sup></option>
                 <option value="A-" <?php echo $data['bloodgroup']=="A-"?"selected":'';?>>A<sup>-</sup></option>
                 <option value="B+" <?php echo $data['bloodgroup']=="B+"?"selected":'';?>>B<sup>+</sup></option>
                 <option value="B-" <?php echo $data['bloodgroup']=="A-"?"selected":'';?>>B<sup>-</sup></option>
                 <option value="AB+" <?php echo $data['bloodgroup']=="AB+"?"selected":'';?>>AB<sup>+</sup></option>
                 <option value="AB-" <?php echo $data['bloodgroup']=="AB-"?"selected":'';?>>AB<sup>-</sup></option>
                 <option value="O+" <?php echo $data['bloodgroup']=="O+"?"selected":'';?>>O<sup>+</sup></option>
                 <option value="O-" <?php echo $data['bloodgroup']=="O-"?"selected":'';?>>O<sup>-</sup></option>
               </select>
                </div>
               <div class="txt-fld1">
                   <input type="radio" class="txt-fld" name="gender" value="Male" <?php echo $data['gender']=="Male"?"checked":''; ?> >Male 
                   <input type="radio" class="txt-fld" name="gender" value="Female" <?php echo $data['gender']=="Female"?"checked":''; ?> >Female
               </div><br><br>
               <input type="submit" name="submit" value="Update">
            </form> 
    <br><br>
    <br><br>
    <?php

    ?>
    


     </div>
</div>
<center>
</body>
</html>