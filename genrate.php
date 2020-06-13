<!DOCTYPE html>
<html>
<head>
	<title>GENRATE #CODE</title>
	<link rel="stylesheet" type="text/css" href="genrate.css">
</head>
<body class="body">




<a class="Button" href="register.html">REGISTER</a>
<a class="Button" href="contact.html">CONTACT</a>
<div class="left">
<a class="Button" href="index.html">HOME</a>
<a class="Button" href="admin.html">ADMIN</a>
</div>
	
<h1>#CODE_GENRATED</h1>

<div class="hasecode">

 <?php
 session_start();
 $hase=$_SESSION["hase"];
 echo"<div class='hase'>$hase  </div>";

if(isset($_POST["send_email"]))
{
	$hash="";
	$hash="b".$hase;
	$conn=mysqli_connect("localhost","root","","voterzz");
	$result=mysqli_query($conn,"select * from voters where hasecode='$hash'");

    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->isSMTP();
  	$mail->Host = "smtp.gmail.com";
  	$mail->SMTPSecure = "ssl";
  	$mail->Port = 465;
    $mail->SMTPAuth = true;
  	$mail->Username = "assrpvtltd@gmail.com";
  	$mail->Password = "1999Rishi";
  	$mail->setFrom('assrpvtltd@gmail.com','Online voting system');

  	while($row=mysqli_fetch_assoc($result))
  	{
  		  $email=$row["email"];
  	    $mail->addAddress($email);
  	     
  	}

  	$mail->isHTML(true);
  	$mail->Subject="hasecode for voting";
  	$mail->Body="please note down the hasecode for voting!<h2>your hasecode is $hase </h2>Thank you!";
  	
  	if($mail->Send())
    {
  		echo"<h6 style='color:red; margin-left:70px;'>hasecode is sended now redirecting to home page</h2>";
       header("refresh:5;url=index.html");
    }
  
  	else
  		echo "somthing went wrong!!!";

}

 ?>


<form action="genrate.php" method="post">
<input class="submit"  type="submit" value="please share this code" name="send_email">

</div>


</body>
</html>