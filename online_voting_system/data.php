<html>
<head>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="data_background">
  <h1 class="a"><span class="blink">GENRATING #CODE..</span></h1>
  <div style="background-image: url(progress.gif); height: 150px;width: 100%;background-repeat: no-repeat;background-position: center;">

  </div>


<?php


    session_start();
    $conn=mysqli_connect("localhost","root","","voterzz");
    if(mysqli_connect_error())
   	  echo"faild to connect to mysql :".mysqli_connect_error();


   	$hase=$_SESSION["hase"];
   	$candidates=$_SESSION["candidates"];
    $voters=$_SESSION["voters"];


    $hase1="a".$hase;//for candidates
    $hase2="b".$hase;//for users
     
$p="a";
$q="b";
$r="c";
$s="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ1234567890";

for($i=0;$i<$candidates;$i++)
{
    //print_r($_POST);
   $u=$p.$s[$i];
   $t=$q.$s[$i];
   $w=$r.$s[$i];

   $cname=$_POST["$u"];
   $email=$_POST["$t"];

   $target="images/".basename($_FILES[$w]['name']);
   $image=$_FILES[$w]['tmp_name'];
   $img_name=$_FILES[$w]['name'];

   mysqli_query($conn,"insert into candidates values('$hase1','$cname','$email','$image','$img_name')");

   move_uploaded_file($image,$target);


}
 
$v=$voters;
 $x="defghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ1234567890";


$b=-1;
$c=28;
do
{
  if($v>=62)
  {
     $a=62;
     $v=$v-62;
     $b=$b+1;
     $c=$c+1;
   }
   else
   {
     $a=$v;
     $v=0;
     $b=$b+1;
   }


for($i=0;$i<$a;$i++)
{

   $u=$x[$b].$s[$i];
   $t=$x[$c].$s[$i];


   $name=$_POST["$u"];
   $mobile=$_POST["$t"];
    
   mysqli_query($conn,"insert into voters values('$hase2','$name','$mobile')");

  }

}while($v>0);

//echo"<h1 >Your hashcode is : $hase </h1>"; 


header("refresh:5;url=genrate.php");
?>


<div class="data_progress">

</div>




</body>
</html>









