<!DOCTYPE html>
<html>
<head>
	<title>to vate</title>
	<link rel="stylesheet" type="text/css" href="voting.css">
</head>
<body class="bg">
<div class="content">
<div class="image">
	<img src="image/user1.png" >
</div>
<h1 class="content_heading"> Enter the information!</h1>
<form method="post" action="vote.php">
<input class="input" type="text" name="hase"   placeholder="Enter the hashcode"><br>
 <input class="input" type="text" name="name"   placeholder="Enter your name"><br>
 <input class="input" type="email" name="email"  placeholder="Enter email address"><br>
 <input class="submit" name="generate_otp" type="submit" value="generate otp first"  >
 </form>  
 


<?php
    session_start();


	$conn=mysqli_connect("localhost","root","","voterzz");

if(isset($_POST["generate_otp"]))
{

	$hase=$_POST["hase"];
   	$name=$_POST["name"];
   	$email=$_POST["email"];
 	$hase1="";
    $hase1="b".$hase;
    
    $v=mysqli_query($conn,"select * from voters where hasecode='$hase1' and email='$email'");
 	$r=mysqli_num_rows($v);

 	$x=mysqli_query($conn,"select * from voted where hasecode='$hase' and email='$email'");
   	$y=mysqli_num_rows($x);
 
    if($r==0)
 	{
        echo"<p class='tt'>please enter the correct informations</p><br>";
    }
    else if($y!=0)
    {
    	echo"<p class='tt'>you have already voted</p><br>";
    }
    else
    {

//to send the otp.....---------

         require 'phpmailer/PHPMailerAutoload.php';
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = "smtp.gmail.com";
         $mail->SMTPSecure = "ssl";
         $mail->Port = 465;
         $mail->SMTPAuth = true;
         $mail->Username = 'noreply.avinashvidyarthi@gmail.com';
         $mail->Password = 'rupakumari';
         $mail->setFrom('noreply.avinashvidyarthi@gmail.com','Online voting system');
         $mail->addAddress($email);
         $mail->isHTML(true);
         $mail->Subject = 'OTP verification';
         $_SESSION['otp']=rand(100000,999999);
         $mail->Body = "your otp is <h2> ".$_SESSION['otp']."</h2>";


         if($mail->send())
         	echo"<h2 style='color:blue; margin-left:70px;'>send</h2>";
         else
         	echo "somthing went wrong!!!";
    	
        //now otp is send...

            $_SESSION["hash"]=$hase;
            $_SESSION["name"]=$name;
            $_SESSION["email"]=$email;
    }
}

//code to verify the otp...
if(isset($_POST["get_otp"]))
{
     if(isset($_SESSION["otp"]))
     {
     	 if($_POST["otp"]==$_SESSION["otp"])
     	 {
     	 	header('location:votingsystem.php');

     	 }
     }
 	 else
 	 {
         echo"<p class='tt'>first enter the above data<p>";

 	 }
}
//------------------------------

?>


<form method="post" action="vote.php" >
 <input class="input" type="password" name="otp" placeholder="Enter the otp">
 <input class="submit" type="submit" value="submit the otp" name="get_otp">
 </form>  




</div>




<br><br><br><br><br><br><br><br><br>
</body>
</html>