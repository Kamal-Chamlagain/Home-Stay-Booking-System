<?php

if($_POST){
    $email = $_POST['uemail'];
    $phone = $_POST['uphone'];
    $upass=$_POST['upass'];
    $ucpass = $_POST['ucpass'];




include('dbconnect.php');

$result = mysqli_query($conn,"SELECT * FROM customer WHERE email='$email' AND uphone='$phone' AND isdelete=0");
$sql = "UPDATE customer SET password='$upass' WHERE email='$email' and isdelete=0";
$row = mysqli_num_rows($result);
if($row >0)
{
    if (mysqli_query($conn,$sql)) {
   
   echo" <script>
  alert('Password successfully reset');
  window.location.href='login.php';
 
 </script>";
    }

 }
 else{
  echo" <script>
  alert('Account Doesnot exist');
  window.location.href='fp.php';
 
 </script>";
 }

mysqli_close($conn);

}





?>