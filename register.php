<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="style.css">
   <title></title>
</head>
<body style="background-color:#999;">

<?php


   session_start();

   //to generate the hase code
   function hasecode($n)
   {
      $code="#";
      $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      $len=strlen($domain);
      for($i=1;$i<$n;$i++)
      {
         $index=rand(0,$len-1);
         $code=$code.$domain[$index];

      }
      return $code;

   }

   $name=$_POST["name"];
   $email=$_POST["email"];
   $orgname=$_POST["orgname"];
   $purpose=$_POST["purpose"];
   $candidates=$_POST["candidates"];
   $voters=$_POST["voters"]; 
   $password=$_POST["password"];
   

   $hase=hasecode(8);//function is written in the top


   $_SESSION["hase"]=$hase;
   $_SESSION["candidates"]=$candidates;
   $_SESSION["voters"]=$voters;
   $conn=mysqli_connect("localhost","root","","voterzz");
   if(mysqli_connect_error())
   	  echo"faild to connect to mysql :".mysqli_connect_error();

mysqli_query($conn,"insert into admin values('$hase','$name','$email','$orgname','$purpose',$candidates,$voters,'$password');");



$s="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ1234567890";
//to take the input of candidates details
$p="a";
$q="b";
$r="c";

echo"Enter the candidates detail:<br><br>";
echo"<form method='post' action='data.php'  enctype='multipart/form-data'>";
for($i=0;$i<$candidates;$i++)
{
   $u=$p.$s[$i];
   $t=$q.$s[$i];
   $w=$r.$s[$i];
   //echo "$u";
   echo"<input class='inpu' type='text' name='$u' placeholder='Enter the name' autofocus required>             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

   echo"<input class='inpu' type='email' name='$t' placeholder='Enter email address' required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

   echo"<input type='file' name='$w' required>";

   echo"<br><br>";
   
}


//to take the input of  voters details
$v=$voters;

echo"<br><br>Enter ther voters details:<br><br>";
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

   echo"<input class='inpu' type='text' name='$u' placeholder='Enter the name' required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

   echo"<input class='inpu' type='email' name='$t' placeholder='Enter email address' required>";

   echo"<br><br>";
}

}while($v>0);

echo"<input type=submit value=submit >";
echo"</form>";

?>


</body>
</html>













