<?php
if($_POST){
$rname= $_POST["uname"];
$remail= $_POST["uemail"];
$address=$_POST['uaddress'];
$phone=$_POST['uphone'];
$rpass= $_POST["upass"];
 
include('dbconnect.php');
$query1 = mysqli_query($conn, "SELECT * FROM customer WHERE email='".$remail."' and isdelete=0");
$query2 =mysqli_query($conn,"SELECT * FROM customer WHERE uphone='".$phone."' and isdelete=0");
    $no = mysqli_num_rows($query1);
    $no1 = mysqli_num_rows($query2);
    
    if($no>=1){
      echo"<script>
      alert('Email already exists.Try another one')
      window.location.href='login.php';
     
     </script>";
    }
    else if($no1>=1){
      echo"<script>
      alert('Phone Number already exists.Try another one')
      window.location.href='login.php';
     
     </script>";
    }
    else {
$sql = "insert into customer (username,uaddress,uphone,email,password) values('$rname','$address','$phone','$remail','$rpass')";
if (mysqli_query($conn,$sql)) {
  
  echo "<script>
  alert('you are successfully registered');
  window.location.href='login.php';
  </script>";

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    }

mysqli_close($conn);

}





?>