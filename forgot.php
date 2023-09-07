<?php 
session_start();
$error = array();

//require "mail.php";

	if(!$con = mysqli_connect("localhost","root","","organ")){

		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$passwords = $_POST['passwords'];
				$password2 = $_POST['password2'];

				if($passwords !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($passwords);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location: userlogin.php");
					die;
				}
				break;
			
			default:
				// code...
				break;
		}
	}

	function send_email($email){
		
		global $con;

		$expire = time() + (60 * 1);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($con,$query);

		// send email here
		// send_mail($email,'Password reset',"Your code is " . $code);
	}
	
	function save_password($passwords){
		
		global $con;

		//$passwords = password_hash($passwords, PASSWORD_DEFAULT);
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "update signup set passwords = '$passwords' where email = '$email' limit 1";
		mysqli_query($con,$query);

	}
	
	function valid_email($email){
		global $con;

		$email = addslashes($email);

		$query = "select * from signup where email = '$email' limit 1";		
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot</title>
	<style type="text/css">
	 *{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
    body{
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        height: 100vh;
        overflow: hidden;
        margin-bottom: 500px;
        
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
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 400px;
          background: rgba(192, 192, 192, 0.5);
          border-radius: 10px;
          padding-top: 10px;
          padding-bottom: 10px;
          padding-left: 40px;
          padding-right: 40px;
      }
      .center h2{
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
        input[type="submit"]{
            float: right;
			width: 59%;
            height: 45px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 20px;
            font-size: 15px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;            
        }
		input[type="submit"]:hover{
            border-color: #2691d9;
            transition: .5s;
        }
		input[type="button"]{
			float: left;
			width: 40%;
            height: 45px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 20px;
            font-size: 15px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;            
        }
		input[type="button"]:hover{
            border-color: #2691d9;
            transition: .5s;
        }
        
        .date{
            color: #adadad;
        }
        .logout{
                position: fixed;
                right: 10px;
                top:5px;
        }
</style>
</head>
<body>


		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
					<div class="nav"><h1>Organ Donation Campaign</h1>
					<!-- LOGOUT Button  -->
					<a href="pass_to_login.php">
						<button class="logout">Login</button>
						</a>
					</div>
					<div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
					
					<div class="logo1"><hr width="190px">organdonarcamp.gov<hr width="190px"></div><br>
				   
					<div style="margin-left: 700px; margin-top: 0px;; padding: 20px; "><!--<img src="/Img/lo2.png" alt="img" width="100px">-->
					<div class="center">
						
						<h2>forgot password</h2>
						<form action="forgot.php?mode=enter_email" method="post">
						<span style="font-size: 12px;color:red;">

						    <?php 
						    		foreach ($error as $err) 
						    		{
						    			// code...
						    			echo $err . "<br>";
						    		}
						    ?>

						</span>	
						
						<div class="txt-fld">
									 <input type="email" name="email" required>
									 <span></span>
									 <label>E-mail</label>
						</div>
							<div class="txt-fld">
								<input type="date" class="date"name="dob" required>
									 <span></span>
									 <label></label>
							</div>
							<br style="clear: both;">
						<input type="submit" name="forget_pass" value="Next">
						</form>
					</div>	
					<?php				
					break;

				case 'enter_code':
					// code...
					?>
					<div class="nav"><h1>Organ Donation Campaign</h1>
					<!-- LOGOUT Button  -->
					<a href="pass_to_login.php">
						<button class="logout">Login</button>
						</a>
					</div>
					<div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
					
					<div class="logo1"><hr width="190px">organdonarcamp.gov<hr width="190px"></div><br>
				   
					<div style="margin-left: 700px; margin-top: 0px;; padding: 20px; "><!--<img src="/Img/lo2.png" alt="img" width="100px">-->
					<div class="center">

						<form method="post" action="forgot.php?mode=enter_code"> 
							<h3>Enter your the code sent to your email</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>
							<div class="txt-fld">
                                  <input type="text" name="code" required>
                                  <span></span>
                                  <label>OTP Code</label>
                             </div>

							<br style="clear: both;">
							<input type="submit" value="Next" >
							<a href="forgot.php">
								<input type="button" value="Start Over">
							</a>
			
						</form>
					</div>	
					<?php
					break;

				case 'enter_password':
					// code...
					?>
					<div class="nav"><h1>Organ Donation Campaign</h1>
					<!-- LOGOUT Button  -->
					<a href="pass_to_login.php">
						<button class="logout">Login</button>
						</a>
					</div>
					<div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
					
					<div class="logo1"><hr width="190px">organdonarcamp.gov<hr width="190px"></div><br>
				   <!-- <div class="text"><a href="Index.html"> Home</a>         <a href="Userlogin.html">Log-in</a>   <a href="Signup.html">Sign-UP</a>     <a href="Adminlogin.html">Admin-Login</a>           </div>--> <br> <br> </div>
					<div style="margin-left: 700px; margin-top: 0px;; padding: 20px; "><!--<img src="/Img/lo2.png" alt="img" width="100px">-->
					<div class="center">

						<form method="post" action="forgot.php?mode=enter_password"> 
							<h2>Enter New Password</h2>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<div class="txt-fld">
                                  <input type="text" name="passwords" required>
                                  <span></span>
                                  <label>Create New Password</label>
                            </div>

                            <div class="txt-fld">
                                <input type="text" name="password2" required>
                                <span></span>
                                <label>Confirm Your Password</label>
                            </div>
							<!-- <input class="textbox" type="text" name="passwords" placeholder="Password"><br>
							<input class="textbox" type="text" name="password2" placeholder="Retype Password"><br> -->
							<br style="clear: both;">
							<input type="submit" value="Change Password">
							<!-- <input type="submit" value="Change Password" style="float: right;"> -->
							<a href="forgot.php">
								<input type="button" value="Start Over">
							</a>
							<!-- <br><br>
							<div><a href="login.php">Login</a></div> -->
						</form>
					</div>
					<?php
					break;
				
				default:
					// code...
					break;
			}

		?>


</body>
</html>