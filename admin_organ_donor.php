<?php
session_start();
include('connection.php');
if(!isset($_SESSION['admindata']))
 {
    header("location: adminlogin.php");
 }

$admindata=$_SESSION['admindata'];
//var_dump($userdata);
//$organ=explode(",",$data['organ']);
//global $id;
$id = $_GET['id'];

$result=$con->query("select * from donor where id='$id' ");

$data=$result->fetch_array();
//var_dump($data);
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
    <title>Update</title>
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
  .form-control_dob{
                   border: none;
                   border-radius: 10px;
                   padding-inline: 7px;
                   height: 40px;
                   width: 109px;
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
    width: 762px;
    margin-top: -40px;
    margin-right: -37px;
}
 </style>
</head>
<body>


    <div class="nav"><h1>Organ Donation Campaign</h1>
    <!-- LOGOUT Button  -->
    <a href="adminlogout.php">
        <button class="logout" >LOG OUT</button>
        </a>
    </div>
    <div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
    
    <div class="logo1"><left><hr width="190px">organdonarcamp.gov<hr width="190px" ></div>
    <br>
    
       <div class=" half">
        <div class="contents">
  <form action="admin_donor_detail_code.php " method="post">
      
    <div class="container1">
      <h3>Update Admin Organ Donor Panel  Details</h3><br>
      <div class="form-block">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?> ">

                    <img src="Img/or6.png" alt="organ" class="or6">          
        <div>
                  <label>Name<span>*</span> ( As it appears on government issued identity card )</label><br>

                  <input type="text" class="form-control" onkeypress="return /[A-Za-z\s]/i.test(event.key)"  name="name" id="fristName" value="<?php echo $data['name']; ?> " size="40" maxlength="100" Placeholder="Enter Full Name" required >
                  
        </div>
            
        

         <div>
                    <br><label>Address<span>*</span></label>&emsp;&emsp;&emsp;&ensp;
                    <!-- <label>Permanent Residential Address<span>*</span></label> -->
                    <br>
                    <input type="text" name="current_address"class="form-control"  value="<?php echo $data['current_address']; ?> "  id="address" maxlength="100" Placeholder="House Number/Flat Number, Society Name"required></textarea>
                    <!-- &emsp;&emsp;&emsp;&emsp;
                    <textarea name="permanent_address"class="form-control" id="address" maxlength="80"class="required" Placeholder="House Number/Flat Number, Society Name"></textarea>
                    &emsp;&emsp;&emsp; -->
        </div>
                   
              <div>
                      <br>
                      <!-- <label>City<span>*</span></label>&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;   -->
                      <label>District<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                      <label>State<span>*</span></label><br>
                      <!-- <input type="text"class="form-control" name="city" id="city" value="" size="30" maxlength="100" class="required" Placeholder="City" onkeypress="return onlyAlphabets(this)" />
                      &emsp;&emsp;  -->
                      <!-- <select class="form-control" name="distric" id="distric"> 
                      <option value="">-- select one -- </option>
                     </select> -->
                     <!-- <input type="text"class="form-control" name="district" id="district"  value="<?php// echo $data['district']; ?> "  size="40" maxlength="50" class="required" aria-required="true" Placeholder="district" onkeypress="return onlyAlphabets(this)" /> -->
                     <select name="district" id="district" class="form-control" value="<?php echo $data['district']; ?>" Placeholder="district"required>
        
                        <option value="Ahmednagar"      <?php echo $data['district']=="Ahmednagar"?"selected":'';?> >Ahmednagar</option>
                        <option value="Akola"           <?php echo $data['district']=="Akola"?"selected":'';?> >Akola</option>
                        <option value="Amravati"        <?php echo $data['district']=="Amravati"?"selected":'';?> >Amravati</option>
                        <option value="Aurangabad"      <?php echo $data['district']=="Aurangabad"?"selected":'';?> >Aurangabad</option>
                        <option value="Beed"            <?php echo $data['district']=="Beed"?"selected":'';?> >Beed</option>
                        <option value="Bhandara"        <?php echo $data['district']=="Bhandara"?"selected":'';?> >Bhandara</option>
                        <option value="Buldhana"        <?php echo $data['district']=="Buldhana"?"selected":'';?> >Buldhana</option>
                        <option value="Chandrapur"      <?php echo $data['district']=="Chandrapur"?"selected":'';?> >Chandrapur</option>
                        <option value="Dhule"           <?php echo $data['district']=="Dhule"?"selected":'';?> >Dhule</option>
                        <option value="Gadchiroli"      <?php echo $data['district']=="Gadchiroli"?"selected":'';?> >Gadchiroli</option>
                        <option value="Gondia"          <?php echo $data['district']=="Gondia"?"selected":'';?> >Gondia</option>
                        <option value="Hingoli"         <?php echo $data['district']=="Hingoli"?"selected":'';?> >Hingoli</option>
                        <option value="Jalgaon"         <?php echo $data['district']=="Jalgaon"?"selected":'';?> >Jalgaon</option>
                        <option value="Jalna"           <?php echo $data['district']=="Jalna"?"selected":'';?> >Jalna</option>
                        <option value="Latur"           <?php echo $data['district']=="Latur"?"selected":'';?> >Latur</option>
                        <option value="Mumbai City"     <?php echo $data['district']=="Mumbai City"?"selected":'';?> >Mumbai City</option>
                        <option value="Mumbai Suburban" <?php echo $data['district']=="Mumbai Suburban</"?"selected":'';?> >Mumbai Suburban</option>
                        <option value="Nagpur"          <?php echo $data['district']=="Nagpur"?"selected":'';?> >Nagpur</option>
                        <option value="Nanded"          <?php echo $data['district']=="Nanded"?"selected":'';?> >Nanded</option>
                        <option value="Nandurbar"       <?php echo $data['district']=="Nandurbar"?"selected":'';?> >Nandurbar</option>
                        <option value="Nashik"          <?php echo $data['district']=="Nashik"?"selected":'';?> >Nashik</option>
                        <option value="Osmanabad"       <?php echo $data['district']=="Osmanabad"?"selected":'';?> >Osmanabad</option>
                        <option value="Palghar"         <?php echo $data['district']=="Palghar"?"selected":'';?> >Palghar</option>
                        <option value="Parbhani"        <?php echo $data['district']=="Parbhani"?"selected":'';?> >Parbhani</option>
                        <option value="Pune"            <?php echo $data['district']=="Pune"?"selected":'';?> >Pune</option>
                        <option value="Raigad"          <?php echo $data['district']=="Raigad"?"selected":'';?> >Raigad</option>
                        <option value="Ratnagiri"       <?php echo $data['district']=="Ratnagiri"?"selected":'';?> >Ratnagiri</option>
                        <option value="Sangli"          <?php echo $data['district']=="Sangli"?"selected":'';?> >Sangli</option>
                        <option value="Satara"          <?php echo $data['district']=="Satara"?"selected":'';?> >Satara</option>
                        <option value="Sindhudurg"      <?php echo $data['district']=="Sindhudurg"?"selected":'';?> >Sindhudurg</option>
                        <option value="Solapur"         <?php echo $data['district']=="Solapur"?"selected":'';?> >Solapur</option>
                        <option value="Thane"           <?php echo $data['district']=="Thane"?"selected":'';?> >Thane</option>
                        <option value="Wardha"          <?php echo $data['district']=="Wardha"?"selected":'';?> >Wardha</option>
                        <option value="Washim"          <?php echo $data['district']=="Washim"?"selected":'';?> >Washim</option>
                        <option value="Yavatmal"        <?php echo $data['district']=="Yavatmal"?"selected":'';?> >Yavatmal</option>

                </select>
                      &emsp;&emsp;
                      <input type="text" name="state" id="state" class="form-control"  value="<?php echo $data['state']; ?> "  size="40" maxlength="50"   Placeholder="State" required>
                     
              </div>

              <div>
                <br><label>PIN Code<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  
                 <label>Mobile Number <span>*</span></label><br>
                <input type="text" Placeholder="PIN Code  eg. 442202" class="form-control" onblur="pincode()" name="pin_code" id="pin_code" value="<?php echo $data['pin_code']; ?> " size="40" maxlength="6" required >
                &emsp;&emsp; 
                <input type="text" Placeholder="Mobile Number" onblur="myFunction()" class="form-control" name="phone" id="mobile" value="<?php echo $data['phone']; ?> "  size="40" maxlength="10" required><span id="mobileError" > </span>
                &emsp;&emsp;<p id="pincodeError" ></p> 

               <!-- <select types="select" class="form-control" value="<?php echo $data['occupation']; ?>" name="occupation" required>
                       <option value="">--- Select ---</option>
                       <option value="Student" <?php echo $data['occupation']=="Student"?"selected":'';?> >Student</option>
                       <option value="Business" <?php echo $data['occupation']=="Business"?"selected":'';?> >Business</option>
                       <option value="Professional" <?php echo $data['occupation']=="Professional"?"selected":'';?> >Professional</option>
                       <option value="Self Employed" <?php echo $data['occupation']=="Self Employed"?"selected":'';?> >Self Employed</option>
                       <option value="Government employee" <?php echo $data['occupation']=="Government employee"?"selected":'';?> >Government Employee</option>
                       <option value="Armed forces" <?php echo $data['occupation']=="Armed forces"?"selected":'';?> >Armed Forces</option>
                       <option value="Retired" <?php echo $data['occupation']=="Retired"?"selected":'';?> >Retired</option>
                       <option value="Home maker" <?php echo $data['occupation']=="Home maker"?"selected":'';?> >Homemaker</option>
              </select> -->
          </div>

          <div>
               <br><label>E-mail<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
               <label>Date Of Birth<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               <label>Gender<span>*</span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <label>Blood Group<span>*</span></label><br>
               <input type="email"class="form-control" name="email"id="email" onblur="checkEmail(this.value)" value="<?php echo $data['email']; ?> " size="40"  maxlength="50"  Placeholder="Email" required>
               &emsp;&emsp;
               <input type="text" name="dob" class="form-control_dob" id="DateofBirth" value="<?php echo $data['dob']; ?> " size="40" aria-required="true" Placeholder="DD/MM/YYYY" >
               &emsp;&emsp;&emsp;&emsp;&emsp;
        
                     <select types="select"  value="<?php echo $data['gender']; ?> "  class="form-control" class="selects required" id="gender" name="gender">
                         <option value="">---Select---</option>
                         <option value="MALE" <?php echo $data['gender']=="MALE"?"selected":'';?>>Male</option>
                         <option value="FEMALE" <?php echo $data['gender']=="FEMALE"?"selected":'';?>>Female</option>
                         <option value="Other" <?php echo $data['gender']=="OTHER"?"selected":'';?>>Other</option>
                     </select>&emsp;&emsp;&emsp;&emsp;&emsp;
                     <!-- value="<?php// echo $data['blood_group']; ?>" -->
               <select types="select"  class="form-control" value="<?php echo $data['blood_group']; ?>"  name="blood_group" id="blood_group"required>
                 <option value="">---Select---</option>
                 <option value="A+" <?php echo $data['blood_group']=="A+"?"selected":'';?>>A<sup>+</sup></option>
                 <option value="A-" <?php echo $data['blood_group']=="A-"?"selected":'';?>>A<sup>-</sup></option>
                 <option value="B+" <?php echo $data['blood_group']=="B+"?"selected":'';?>>B<sup>+</sup></option>
                 <option value="B-" <?php echo $data['blood_group']=="A-"?"selected":'';?>>B<sup>-</sup></option>
                 <option value="AB+" <?php echo $data['blood_group']=="AB+"?"selected":'';?>>AB<sup>+</sup></option>
                 <option value="AB-" <?php echo $data['blood_group']=="AB-"?"selected":'';?>>AB<sup>-</sup></option>
                 <option value="O+" <?php echo $data['blood_group']=="O+"?"selected":'';?>>O<sup>+</sup></option>
                 <option value="O-" <?php echo $data['blood_group']=="O-"?"selected":'';?>>O<sup>-</sup></option>
               </select>
          </div> 

          <div>
             <br>
             <!-- <label>Guardian Contact Number.<span>*</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; -->
          
            <label> Enter Aadhar Card Number<span>*</span></label><br>
            <!-- <input type="text" name="guardian_phone"  class="form-control" id="kins_phone_no" Placeholder="Enter Emergency Contact Number" title="Enter Emergency Contact Number" value="" size="40" maxlength="10" class="required" aria-required="true" onkeypress="return isNumber(event)"> 
            &emsp;&emsp; -->

          <input type="text" name="aadhar_no"  onblur="AadharValidate();"  value="<?php echo $data['aadhar_no']; ?> "  class="form-control"id="aadhar" size="40" maxlength="12"Placeholder="Enter No."required>

      </div>                
      <br>

      <!-- <div class="col-md-12 donate_checkbox"> -->
        <!-- <br><label style="padding-top:20px;">Organs that I wish to donate :<span>*</span></label>
              <div class="inline" style="position:relative" >
                
                  <input type="checkbox"     name="organ[]" value="Corneas"<?php// echo in_array("Corneas",$organ)?"checked":''; ?>  id="Corneas" class="donate-check donorform" />Corneas (Eyes)
                 <label for="Corneas" class="labelwish">Corneas (Eyes)</label>&emsp; 
      
                  <input type="checkbox"     name="organ[]" value="Kidneys" <?php //echo in_array("Kidneys",$organ)?"checked":''; ?>  id="Kidneys" class="donate-check donorform" >Kidneys
                 <label for="Kidneys" class="labelwish"></label>&emsp; 
      
                  <input type="checkbox"     name="organ[]" value="Bone_Marrow" <?php// echo in_array("Bone_Marrow",$organ)?"checked":''; ?>  id="Bone_Marrow" class="donate-check donorform" />
                  <label for="Heart"   class="labelwish">Bone Marrow</label>&emsp;
      
                  <input type="checkbox"     name="organ[]" value="Lungs" id="Lungs" <?php// echo in_array("Lungs",$organ)?"checked":''; ?> class="donate-check donorform" />
                  <label for="Lungs"   class="labelwish">Lungs</label>&emsp;
      
                  <input type="checkbox"     name="organ[]" value="Liver" id="Liver" <?php //echo in_array("Liver",$organ)?"checked":''; ?>  class="donate-check donorform" />
                  <label for="Liver"   class="labelwish">Liver</label>&emsp;
      
                  <input type="checkbox"  name="organ[]" value="Pancreas" id="Pancreas" <?php //echo in_array("Pancreas",$organ)?"checked":''; ?>  class="donate-check donorform" />
                  <label for="Pancreas"class="labelwish">Pancreas</label>&emsp;
      
                  <input type="checkbox" name="organ[]" value="Intestine" id="Intestine" <?php //echo in_array("Intestine",$organ)?"checked":''; ?>  class="donate-check donorform" />
                  <label for="smallintestine" class="labelwish">Intestine </label>&emsp;
      
                  <input type="checkbox"name="organ[]" value="Skin" id="Skin" <?php// echo in_array("Skin",$organ)?"checked":''; ?>  class="donate-check donorform" />
                  <label for="Skin" class="labelwish">Skin</label>&emsp;
      
                  <input type="checkbox"name="organ[]" value="Body_Tissues" <?php// echo in_array("Body_Tissues",$organ)?"checked":''; ?> id="Body_Tissues" class="donate-check donorform" />
                  <label for="Skin" class="labelwish">Body Tissues</label>&emsp;
                   </div> 
              </div> -->
   
      
           <br><br>     
                <div>
                  
                       <input type="Submit" name="save" value="Update" class="btn" >
                  
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