<?php
session_start();

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

    //     function UppeCapital() 
    // {
    //   var x = document.getElementById("name");
    //    x.value = x.value.toUpperCase();
        
    // }  

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
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
    
    <style>
         *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        body{
            margin-bottom: 1000px;
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
      #mobileError{
        color: red ;
        font-size: 16px;

      }

      .text{
          font-size: medium; font-family: sans-serif;
          text-indent: 30px;
        /*  color: rgb(29, 29, 177);*/
          font-weight: 300;
          word-spacing: 20px;
      }
      .text a{
          color: #2691d9;
            text-decoration: none ;
      }
      .text a :hover{
          text-decoration: underline;
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

        .date{
            color: #adadad;
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
        .txt-fld input:valid ~ label
       { 
            top: -5px;
            color: #2691d9;

        } 
        .txt-fld input:focus ~ span::before,
        .txt-fld input:valid ~ span::before{
            width: 100%;

        }
        .password{
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }
        .password:hover{
            text-decoration: underline;
        }
        input[type="submit"]{
            align-items: center;
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
        input[type="submit"]:hover{
            border-color: #2691d9;
            transition: .5s;
         } *{
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
    width: 775px;
    margin-top: -58px;
    margin-right: -22px;
} 

    </style>
</head>
<body>
<div>
    <div class="nav">
        <h1>Organ Donation Campaign</h1>
    </div>

    <div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
    
    <div class="logo1"><hr width="190px">organdonarcamp.gov<hr width="190px"></div><br>

    <div class="text"> <a href="Index.php">Home</a>       
                       <a href="Userlogin.php">Log-in</a> 
                       <a href="Signup.php">Sign-UP</a>    
                       <a href="Adminlogin.php">Admin-Login</a>       
    </div>

        <div class="center">

        <!-- <input id="demo" type="text" onblur="myFunction()"> -->
        <!--   pattern="[a-zA-Z]{1,50}" title="Only Alphabets Are Allowed" -->
            <h1>Registration Form</h1>
            <form action="signup_code.php" method="post"   >
                <div class="txt-fld">
                    <input type="text" onkeypress="return /[A-Za-z\s]/i.test(event.key)" maxlength="50" name="name" id="name"  required>
                    <span></span>
                    <label>Enter Name</label>
                </div>
                <div class="txt-fld">
                    <input type="password"  name="passwords" id="passwords" onblur="Password()" required>
                    <span></span>
                    <label>Enter Password</label>
                </div>
                <div class="txt-fld">
                    <input type="password" name="confirm_password" onblur="CheckPassword()" id="confirm_password" required>
                    <span></span>
                    <label>Confirm Password</label>
                </div>
                <div class="txt-fld">
                <!-- pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid E-mail ID... Example: xyz@abc.com"-->
                     <input type="email" name="email"   id="email"  onblur="checkEmail(this.value)" required>
                     <span></span>
                     <label>Enter E-mail</label>
                 </div>
                <div class="txt-fld">
                     <input type="text" name="address" id="address" required >
                     <span></span>
                     <label>Enter Address</label>
                 </div>
                <!-- <div class="txt-fld">
                     <input type="text" name="bloodgroup" required>
                     <span></span>
                     <label>Enter Blood Group</label>
                </div> -->
                 <div class="txt-fld">
                     <input type="date" class="date"name="dob" min="1940-01-01" max="2022-08-18" required>
                     <span></span>
                     <label></label>
                  </div>
                  <div class="txt-fld">
                      <!-- pattern="[7-9]{1}[0-9]{2,9}" -->
                     <input type="text" name="phone" id="mobile" onblur="myFunction()"  maxlength="10"  required>
                     <span></span>
                     <label>Enter Mobile no.</label><br>
                     <p id="mobileError" ></p>
                   </div>
                   <div>
                   <!-- <label>Blood Group<span>*</span></label> -->
                   <select types="select"  class="form-control"class="selects required" name="bloodgroup" id="bloodgroup"required>
                 <option value="">Blood Group</option>
                 <option value="A+">A<sup>+</sup></option>
                 <option value="A-">A<sup>-</sup></option>
                 <option value="B+">B<sup>+</sup></option>
                 <option value="B-">B<sup>-</sup></option>
                 <option value="AB+">AB<sup>+</sup></option>
                 <option value="AB-">AB<sup>-</sup></option>
                 <option value="O+">O<sup>+</sup></option>
                 <option value="O-">O<sup>-</sup></option>
               </select>
                </div>
                   <div class="txt-fld1" >
                       <input type="radio" class="txt-fld" name="gender" value="Male">Male 
                       <input type="radio" class="txt-fld" name="gender" value="Female">Female
                   </div><br><br>
                   <input type="submit" name="submit" value="Submit">
    </form>  
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>