<?php
session_start();
if($_POST){
$usemail= $_POST["uemail"];
$uspass= $_POST["upass"];

 

include('dbconnect.php');

$result = mysqli_query($conn,"SELECT * FROM customer WHERE email='$usemail' and isdelete=0");

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);



if($row){

 if($row['email']==$usemail && $row['password']==$uspass){
  $ids=$row['id'];
  
   $_SESSION['userid'] = $ids;
   
   echo" <script>
  alert('Valid Username and Password');
  window.location.href='index.php';
 
 </script>";
 }
 else{
  echo" <script>
  alert('Invalid Username or Password');
   window.location.href='login.php';
 
 </script>";
 


}
}

else{
  echo" <script>
  alert('Invalid Username or Password');
   window.location.href='login.php';
 
 </script>";
 


}

mysqli_close($conn);

}
?>
