<?php

if($_POST){
$uname= $_POST['uname'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$odate = date("Y-m-d");

include('dbconnect.php');
$sql = "insert into review (username,subject,message,pdate) values('$uname','$subject','$message','$odate')";
if (mysqli_query($conn,$sql)) {
  
  echo "<script>
  alert('your review is sent');
  window.location.href='contact.php';
  </script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}





?>