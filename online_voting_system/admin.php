<!DOCTYPE html>
<html>
<head>
	<title>admin pannel</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" type="text/css" href="admi.css">
</head>
<body class="body">
	<div class="wrapper">
		<div class="nav">
			<div class="left">

				<ul>
					
					<li><a class="Button" href="register.html">REGISTER</a></li>
					<li><a class="Button" href="contact.html">CONTACT</a></li>
				</ul>
			</div>
			<div class="right">
				<ul>
					<li><a class="Button" href="index.html">HOME</a></li>
					<li><a class="Button" href="admin.php">ADMIN</a></li>
				</ul>
				</div>
		</div>
<div class="content">

<img class="img" src="image/admin.png" height=70px width=70px>


<form method="post" action="admin.php">
	<input class="input" name="hase" type="text" placeholder="Enter hasecode" autofocus required>
	<input class="input" name="email" type="email" placeholder="Enter email address" required>
	<input class="input" name="pass" type="password" placeholder="Enter password" required>
	<input class="submit" type="submit" value="submit" name="entered">
</form>


<?php

    session_start();
   if(isset($_POST["entered"]))
   {
   		$hase=$_POST["hase"];
   		$email=$_POST["email"];
   		$password=$_POST["pass"];

   		$conn=mysqli_connect("localhost","root","","voterzz");
   		$x=mysqli_query($conn,"select * from admin where  hasecode='$hase' and email='$email' and password='$password'");

   		$y=mysqli_num_rows($x);
   		if($y==0)
   		{
   			echo"<p class='error'>please enter the correct information!</p>";
   		}
   		else
   		{
   			$_SESSION["hase"]=$hase;
   			$_SESSION["email"]=$email;
   			$_SESSION["pass"]=$password;
   			header('location:verified_admin.php');
   		}
 }   

?>

</div>


<br><br><br>
</body>
</html>