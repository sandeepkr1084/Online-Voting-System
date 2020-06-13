<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body class="body1">





<?php
	session_start();

	$hase=$_SESSION["hase"];
	$email=$_SESSION["email"];
	$password=$_SESSION["pass"];

    $conn=mysqli_connect("localhost","root","","voterzz");


   $result=mysqli_query($conn,"select name,count(email) from result where hasecode='$hase' group by name,email;");
   echo"<div class='result1'>";
   echo"<div class='number1'>votes</div><div class='name1'>Name</div>";
   echo"</div>";
   while($row=mysqli_fetch_assoc($result))
   {
      echo"<div class='result'>";
   		echo"<div class='number'>".$row["count(email)"]."</div><div class='name'> ".$row["name"]."</div>";
      echo"</div>";
   }
   



?>

</body>
</html>