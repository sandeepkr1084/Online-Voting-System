<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="voting.css">
  <link rel="stylesheet" type="text/css" href="admi.css">
	<script type="text/javascript" src="voted.js"></script>
</head>

<body style="background-color: #333;">
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
          <li><a class="Button" href="admin.html">ADMIN</a></li>
        </ul>
        </div>
    </div>


<h1 style="color:blue;margin-left: 300px;">choose your trustable candidate!</h1>


<?php

    session_start();

    $conn=mysqli_connect("localhost","root","","voterzz");

    $hase=$_SESSION["hash"];
    $name=$_SESSION["name"];
    $email=$_SESSION["email"];

    $chase="";
    $chase="a".$hase;
    
    $result=mysqli_query($conn,"select * from candidates where hasecode='$chase'");
   
    while($row=mysqli_fetch_assoc($result))
    {

    	 

    	
       echo"<a href='voted.php?a=".$row["email"]."' class='ab' onClick='return gotoVoted()'><div class='vote'> ";

       echo"<br><div class='voting'>
       <img src='images/".$row["img_name"]."' height=150px width=150px style='border-radius:10px;'>
       </div>

       <div><h1 class=can> ".$row["name"]." </h1></div> ";

        echo"</div></a> ";
       

    }
    
    

?>






</body>
</html>

