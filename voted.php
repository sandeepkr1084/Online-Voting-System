<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="voted.css">
</head>
<body  class="photo">
<h1>THANKU FOR VOTING<h1>
    <div></div>
    <h2>Redirecting To Home Page</h2>
    <div class="gif"></div>



<?php
  session_start();

  	$conn=mysqli_connect("localhost","root","","voterzz");

  	$chase="";
    $hase=$_SESSION["hash"];
    $name=$_SESSION["name"];
    $email=$_SESSION["email"];

    $can_email=$_GET["a"];
    $chase="a".$hase;
  
    $c=mysqli_query($conn,"select name from candidates where hasecode='$chase' and email='$can_email'");
    $r=mysqli_fetch_assoc($c);


    $cname="".$r["name"]."";


    mysqli_query($conn,"insert into voted values('$hase','$name','$email');");

    mysqli_query($conn,"insert into result values('$hase','$cname','$can_email');");


      header("refresh:5;url=index.html");
?>




</body>
</html>