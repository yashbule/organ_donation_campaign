<?php
 session_start();
 if(isset($_SESSION['userdata']))
 {
    header("location: donor.php");
 }

include('connection.php');

if(isset($_POST['login']))
{
    extract($_POST);
    $result=$con->query ("select * from signup where email = '$email' AND passwords = '$passwords'");

    if($result->num_rows > 0)
    {
        $userdata=$result->fetch_array();
        $_SESSION['userdata']=$userdata;
        header("location: donor.php");
    }
    else{

      ?>
        <center>
       <H1 style="color:red"> Check your Email ID and Password </H1>
    </center>
      <?php  
      // var_dump(($result->num_rows));
    }
    
   
    
}


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login..</title>
    <style>
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
            margin-bottom: 600px;
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
          /*color: rgb(29, 29, 177);*/
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
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 400px;
          background: rgba(192, 192, 192, 0.5);
          border-radius: 10px;
          margin-top: 60px;
          padding-top: 20px;
          padding-bottom: 10px;
          padding-left: 40px;
          padding-right: 40px;
      }
      .success {
    text-align: center;
    background-color: #2bb02b70;
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
        .pass a{
            color: #2691d9;
            text-decoration: none;
        }
        .pass a:hover{
            text-decoration: underline;
        }
        .pass:hover{
            text-decoration: underline;
        }
        input[type="submit"]{
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
        }
        .signup_link{
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }
        .signup_link a{
            color: #2691d9;
            text-decoration: none ;
        }
        .signup_link a:hover{
            text-decoration: underline;
        }
        .logout{
                position: fixed;
                right: 10px;
                top:5px;
        }
    </style>
</head>
<body>
    <div class="nav"><h1>Organ Donation Campaign</h1>
    <a href="pass_to_login.php">
        <button class="logout" >Login</button>
        </a>
    </div>
    <div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
    
    <div class="logo1"><hr width="190px">organdonarcamp.gov<hr width="190px"></div><br>
    <div class="text"> <a href="Index.php">Home</a>       
                       <a href="Userlogin.php">Log-in</a> 
                       <a href="Signup.php">Sign-UP</a>    
                       <a href="Adminlogin.php">Admin-Login</a>       
    </div>

    
    <div class="center">
    <div class="success">
        
        <?php
           if(isset($_SESSION['status']))
        {
          
          ?>
          <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Hey! , <?php echo $_SESSION['status']; ?> </h4>
    <hr>
    
    </div>
          <?php
          unset($_SESSION['status']);
        }
         ?>
      </div>
        <br>
        <br>
        <h1 style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">User Login</h1>
       
        <form action = "" method="post">

        <div class="txt-fld">
                     <input type="email" name="email" required>
                     <span></span>
                     <label>E-mail</label>
                 </div>

            <div class="txt-fld">
                <input type="password" name="passwords" required>
                <span></span>
                <label>Password</label>
            </div><br>
            <input type="submit" name="login" value="Login">
        </form>

        <div class="pass"> <a href="forgot.php">Forget Password?</a></div>
   
        <div class="signup_link">
        Not a member             <a href="Signup.php">Signup</a></div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    
    
</body>
</html>