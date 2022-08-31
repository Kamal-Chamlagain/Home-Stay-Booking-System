<?php
session_start();
if($_POST){
$uemail= $_POST["uemail"];
$upass= $_POST["upass"];

 

include('dbconnect.php');

$result = mysqli_query($conn,"SELECT * FROM admin WHERE username='$uemail' AND password='$upass'  ");

$row = mysqli_num_rows($result);
if($row >0)
{
   $_SESSION['valid']=1;
   echo" <script>
  alert('Valid Username and Password');
  window.location.href='admin.php';
 
 </script>";

 }
 else{
  echo" <script>
  alert('Invalid Username or Password');
  window.location.href='index.php';
 
 </script>";
 }

mysqli_close($conn);

}





?>