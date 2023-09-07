<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to our site...</title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        body{
            margin-bottom: 200px;
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
      .text a{
          color: #2691d9;
            text-decoration: none ;
      }
      .text a :hover{
          text-decoration: underline;
      }
      .container{
          
          padding-top: 60px;
          width: 1600px;
          height: 400px;
          
          background:  rgba(82, 104, 165,0.5) url("Img/Img1.png") no-repeat left ;
        
      }
      #head{
        color: black;
    position: absolute;bottom: 50px; left: 850px;top: 300px;
      }
    #para{
        color: black;
    position: absolute;bottom: 50px; left: 850px;top: 360px;
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight: bolder;
    font-size: large
    }
    .float-img{
        float: left;
        margin-right: 0px;
        margin-bottom: 5px;
        padding: 0px;
    }
    #para1{
        color: black;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bolder;
        font-size: medium;
        text-align: justify;
    }
    #para2{
        color: black;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bolder;
        font-size: medium;
    }
    .contact{
        padding-top: 20px;
    
        width: 1600px;
        height: 300px;
        display: flex;
        justify-items: left;
        width: 200px;
        
        
        
    }
    
    
    
       

    
    </style>
</head>
<body>
    <div class="nav"><h1>Organ Donation Campaign</h1>
    </div>
    <div class="logo" width="100px"><img src="Img/lo3.jpg" alt="img"></div>
    
    <div class="logo1"> <hr width="190px">organdonarcamp.gov<hr width="190px"> </div>
    <br>

    <div class="text"> <a href="Index.php">Home</a>       
                       <a href="Userlogin.php">Log-in</a> 
                       <a href="Signup.php">Sign-UP</a>    
                       <a href="Adminlogin.php">Admin-Login</a>       
    </div>
    <br><br>

    <div class="container">
        <h1 id="head">Find Health Centers</h1>
        <p id="para">Find a health center near your 
             <br>primary health care
             <br>for Organ Donation
             <br><br></p>
    </div>
         <div class="float-img"><img src="Img/img6.jpg" alt="img"></div><br><br><br><br>  

            <p id="para1">Organ donation is the process when a person allows an organ of their own to be removed and transplanted to another person, legally, either by consent while the donor is alive or dead with the assent of         the next of kin.

            Donation may be for research or, more commonly, healthy transplantable organs and tissues may be donated to be transplanted into another person.</p>
            
            <p id="para2"> Common transplantations include kidneys, heart, liver, pancreas, intestines, lungs, bones, bone marrow, skin, and corneas. Some organs and tissues can be donated by living donors, such as a kidney or part of the liver, part of the pancreas, part of the lungs or part of the intestines, but most donations occur after the donor has died.
            
            In 2019, Spain had the highest donor rate in the world at 46.91 per million people, followed by the US (36.88 per million), Croatia (34.63 per million), Portugal (33.8 per million), and France (33.25 per million).<br><br> For More Information....</p><br><br>
            <a href="http://en.wikipedia.org/wiki/Organ_donation#:~:text=Organ%20donation%20is%20the%20process,of%20the%20next%20of%20kin.">Click Here</a> <br><br><br>
            <div class="contact">
                               <img src=" Img/img4.jpg" alt="img"> 
            </div> <br> <br>
            <div style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ; font-weight: bolder; font-size: larger;text-align: center;color: rgb(54, 54, 181); ">  <h1> "No cast - No bar - save lives - donate organs......"</h1></div>
        </body>
</html>