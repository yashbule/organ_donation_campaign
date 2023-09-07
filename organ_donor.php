<?php
session_start();
include('connection.php');
if(!isset($_SESSION['userdata']))
 {
    header("location: userlogin.php");
 }

$userdata=$_SESSION['userdata'];
//var_dump($userdata);

if(isset($_POST['save']))
{
extract($_POST);
$organ = implode(',', $organ);
$result = "insert into donor(name,current_address,district,state,pin_code,phone,email,dob,gender,blood_group,aadhar_no,organ) values('$name','$current_address','$district','$state','$pin_code','$phone','$email','$dob','$gender','$blood_group','$aadhar_no','$organ')";
$query_run=mysqli_query($con,$result); 

if($query_run)
{
      $_SESSION['status1']   = "Thank You for joining our community ";
      header("location: donor.php");
}
//var_dump($result);

}
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
          //pincode VAlidation
          function pincode()
         {
             const message = document.getElementById("pincodeError");
             message.innerHTML = "";
             let x = document.getElementById("pin_code").value;
                try 
                { 
                  if(x == "")  throw "Blank , Enter 6 Digit Pin Code";
                  if(isNaN(x)) throw "not a Number , Enter 6 Digit Pin Code eg. 444601";
                  x = Number(x);
                  if(x < 400000)  throw "not proper , Enter 6 Digit Pin Code eg. 444601";
                  //if(x > 10)   throw "too high";
                }
             catch(err) {
               message.innerHTML = "Input is " + err;
             }
          }
      //Password VAlidation
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
    function AadharValidate()
    {
    var aadhar = document.getElementById("aadhar").value;
    var adharcardTwelveDigit = /^\d{12}$/;
    if (aadhar != '') {
        if (aadhar.match(adharcardTwelveDigit))
        {
            return true;
        } 
        {
            alert("Enter valid Aadhar Number");
            return false;
        }

        }
    }

   
                      
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organ Donor</title>
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
     #mobileError,#pincodeError{
        color: red ;
        font-size: 16px;

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


    <div class="nav"><h1>Organ Donation Campaign</h1>
    <!-- LOGOUT Button  -->
    <a href="userlogout.php">
        <button class="logout" >LOG OUT</button>
        </a>
    </div>
    <div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
    
    <div class="logo1"><left><hr width="190px">organdonarcamp.gov<hr width="190px" ></div>
    <br>
    
       <div class=" half">
        <div class="contents">
  <form action="#" method="post">
      
    <div class="container1">
      <h3>Organ Donor Details</h3><br>
      <div class="form-block">
                    <img src="Img/or6.png" alt="organ" class="or6">          
        <div>
                  <label>Name<span>*</span> ( As it appears on government issued identity card )</label><br>

                  <input type="text" onkeypress="return /[A-Za-z\s]/i.test(event.key)"  class="form-control"  name="name" id="name" value="" size="40" maxlength="100"  Placeholder="Enter Full Name" required>
                  
        </div>
            
        

         <div>
                    <br><label>Address<span>*</span></label>&emsp;&emsp;&emsp;&ensp;
                    <!-- <label>Permanent Residential Address<span>*</span></label> -->
                    <br>
                    <textarea name="current_address"class="form-control" id="address" maxlength="12" Placeholder="House Number/Flat Number, Society Name" required></textarea>
                    <!-- &emsp;&emsp;&emsp;&emsp;
                    <textarea name="permanent_address"class="form-control" id="address" maxlength="80"class="required" Placeholder="House Number/Flat Number, Society Name"></textarea>
                    &emsp;&emsp;&emsp; -->
        </div>
                   
              <div>
                      <br>
                      <label>District<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                      
                      <label>State<span>*</span></label><br>             
                        <select name="district" id="district" class="form-control" Placeholder="district" required>
                        <option value=""                 >--- Select ---</option>
                        <option value="Ahmednagar"       >Ahmednagar</option>
                        <option value="Akola"            >Akola</option>
                        <option value="Amravati"         >Amravati</option>
                        <option value="Aurangabad"       >Aurangabad</option>
                        <option value="Beed"             >Beed</option>
                        <option value="Bhandara"         >Bhandara</option>
                        <option value="Buldhana"         >Buldhana</option>
                        <option value="Chandrapur"       >Chandrapur</option>
                        <option value="Dhule"            >Dhule</option>
                        <option value="Gadchiroli"       >Gadchiroli</option>
                        <option value="Gondia"           >Gondia</option>
                        <option value="Hingoli"          >Hingoli</option>
                        <option value="Jalgaon"          >Jalgaon</option>
                        <option value="Jalna"            >Jalna</option>
                        <option value="Latur"            >Latur</option>
                        <option value="Mumbai City"      >Mumbai City</option>
                        <option value="Mumbai Suburban"  >Mumbai Suburban</option>
                        <option value="Nagpur"           >Nagpur</option>
                        <option value="Nanded"           >Nanded</option>
                        <option value="Nandurbar"        >Nandurbar</option>
                        <option value="Nashik"           >Nashik</option>
                        <option value="Osmanabad"        >Osmanabad</option>
                        <option value="Palghar"          >Palghar</option>
                        <option value="Parbhani"         >Parbhani</option>
                        <option value="Pune"             >Pune</option>
                        <option value="Raigad"           >Raigad</option>
                        <option value="Ratnagiri"        >Ratnagiri</option>
                        <option value="Sangli"           >Sangli</option>
                        <option value="Satara"           >Satara</option>
                        <option value="Sindhudurg"       >Sindhudurg</option>
                        <option value="Solapur"          >Solapur</option>
                        <option value="Thane"            >Thane</option>
                        <option value="Wardha"           >Wardha</option>
                        <option value="Washim"           >Washim</option>
                        <option value="Yavatmal"         >Yavatmal</option>

                </select>

                      &emsp;&emsp;
                      <input type="text"class="form-control" name="state"  id="state" value="Maharashtra" size="40" maxlength="50" Placeholder="State" required>
                        
                           
              </div>

              <div>
                <br><label>PIN Code<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  
                 <label>Mobile Number <span>*</span></p></label>
                 <!-- <label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 
                 Occupation</label> -->
                 
                <input type="text" Placeholder="PIN Code  eg. 442202" onblur="pincode()" class="form-control" name="pin_code" id="pin_code" value="" size="40" maxlength="6" required >
                &emsp;&emsp; 
                <input type="text" Placeholder="Mobile Number" onblur="myFunction()" class="form-control"name="phone" id="mobile"  size="40" maxlength="10" required> <span id="mobileError" ></span>
                &emsp;&emsp;<p id="pincodeError" ></p>

               <!-- <select types="select" class="form-control"  name="occupation">
                       <option value="">--- Select ---</option>
                       <option value="Student">Student</option>
                       <option value="Business">Business</option>
                       <option value="Professional">Professional</option>
                       <option value="Self Employed">Self Employed</option>
                       <option value="Government employee">Government Employee</option>
                       <option value="Armed forces">Armed Forces</option>
                       <option value="Retired">Retired</option>
                       <option value="Home maker">Homemaker</option>
              </select> -->
          </div>

          <div>
               <br><label>E-mail<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
               <label>Date Of Birth<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               <label>Gender<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <label>Blood Group<span>*</span></label><br>
               <input type="email"class="form-control" name="email" id="email" value="" size="40" onblur="checkEmail(this.value)" maxlength="40" Placeholder="Email" required>
               &emsp;&emsp;
               <input type="date" name="dob" class="form-control" id="DateofBirth" value="" min="1940-01-01" max="2022-08-18" size="40" Placeholder="DD/MM/YYYY" required>
               &emsp;&emsp;&emsp;&emsp;&emsp;
            
                     <select types="select"  class="form-control" class="selects required" id="gender" name="gender" required>
                         <option value="">---Select---</option>
                         <option value="MALE">Male</option>
                         <option value="FEMALE">Female</option>
                         <option value="Other">Other</option>
                     </select>&emsp;&emsp;&emsp;&emsp;&emsp;
             
               <select types="select"  class="form-control" class="selects required" name="blood_group" id="blood_group"required>
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
               
          </div>

          <div>
             <br>
             <!-- <label>Guardian Contact Number.<span>*</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; -->
          
            <label> Enter Aadhar Card Number<span>*</span></label><br>
            <!-- <input type="text" name="guardian_phone"  class="form-control" id="kins_phone_no" Placeholder="Enter Emergency Contact Number" title="Enter Emergency Contact Number" value="" size="40" maxlength="10" class="required" aria-required="true" onkeypress="return isNumber(event)"> 
            &emsp;&emsp; -->

          <input type="text" name="aadhar_no" onblur="AadharValidate();" class="form-control"id="aadhar" size="40" maxlength="12" class="required identity" Placeholder="Enter No." required>

      </div>                
      <br>

      <div class="col-md-12 donate_checkbox">
        <br><label style="padding-top:20px;">Organs that I wish to donate :<span>*</span></label>
              <div class="inline" style="position:relative" >
                
                  <input type="checkbox"     name="organ[]" value="Full Body" id="Full_Body" class="donate-check donorform" />
                  <label for="Corneas" class="labelwish">Full Body</label>&emsp;
                  
                  <input type="checkbox"     name="organ[]" value="Corneas" id="Corneas" class="donate-check donorform" />
                  <label for="Corneas" class="labelwish">Corneas (Eyes)</label>&emsp;
      
                  <input type="checkbox"     name="organ[]" value="Lungs" id="Lungs" class="donate-check donorform" />
                  <label for="Lungs"   class="labelwish">Lungs</label>&emsp;

                  <input type="checkbox"     name="organ[]" value="Kidney" id="Kidney" class="donate-check donorform" />
                  <label for="Kidney" class="labelwish">Kidney</label>&emsp;            
      
                  <input type="checkbox"     name="organ[]" value="Liver" id="Liver" class="donate-check donorform" />
                  <label for="Liver"   class="labelwish">Liver</label>&emsp;
      
                  <input type="checkbox"  name="organ[]" value="Pancreas" id="Pancreas" class="donate-check donorform" />
                  <label for="Pancreas"class="labelwish">Pancreas</label>&emsp;
      
                  <input type="checkbox"name="organ[]" value="Skin" id="Skin" class="donate-check donorform" />
                  <label for="Skin" class="labelwish">Skin</label>&emsp;
      
                  <input type="checkbox"name="organ[]" value="Body_Tissues" id="Body_Tissues" class="donate-check donorform" />
                  <label for="Skin" class="labelwish">Body Tissues</label>&emsp;
              </div>
   
       </div>     <br><br>     
                <div>
                  
                       <input type="Submit" name="save" value="Register" class="btn" >
                  
                </div>  
   </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div> 

  </div>
   </body>
</html>