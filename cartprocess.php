<?php
include('dbconnect.php');
session_start();
if(isset($_SESSION['userid'])){
   
$uid=$_SESSION['userid'];
$pid=$_POST['id'];
$cname=$_POST['pname'];
$rname = $_POST['rname'];
// $pqty=$_POST['pqty'];
$prate=$_POST['prate'];
$ptodate=$_POST['toDate'];
$pfromdate=$_POST['fromDate'];

$date1=date_create($ptodate);
$date2=date_create($pfromdate);
$diff=date_diff($date1,$date2);
$no = $diff->format("%a");

$amount =$prate*$no;

// $rname = $_POST['rname'];
// $pid=$_POST['id'];
// $ptodate=$_POST['toDate'];
// $pfromdate=$_POST['fromDate'];
$count =0;
$row = 0;
$sql3 = mysqli_query($conn, "SELECT * FROM booking WHERE rname='".$rname."' and isdelete=0");

$row = mysqli_num_rows($sql3);
 if($row== 0){
  $count = $count+1;
 }
 
while ($row = mysqli_fetch_assoc($sql3)) {
  if($pfromdate>=$row['rFrom'] && $ptodate <= $row['rTo'])
  {
    $count = 0;
    break;
  }
  else if($pfromdate < $row['rFrom'])
  {
    if($ptodate <= $row['rFrom'])
    {
      $count = $count + 1;
    }
    else if($ptodate > $row['rFrom']){
      $count = 0;
      break;
    }
  
  }

  else if($pfromdate >= $row['rFrom'])
  {
    if($pfromdate >= $row['rTo'])
    {
      $count = $count + 1;
    }
    else if($pfromdate < $row['rTo']){
      $count = 0;
      break;
    }
  }


 }

// $title=$_POST['pdesc'];
if(isset($_POST['submit'])){
   
   $query1 = mysqli_query($conn, "SELECT * FROM cart WHERE rname='".$rname."'  AND uid=$uid AND isdelete=0");
    $no = mysqli_num_rows($query1);
  
    // echo $no;
    if($no>=1){
      echo"<script>
      alert('Room already added to the cart');
      window.location.href='mycart.php';
     
     </script>";
    }
   

   
    else if($count > 0){
      $sql = "insert into cart (uid,rid,rname,cat_name,rate,rFrom,rTo,amount) values('$uid','$pid','$rname','$cname','$prate','$pfromdate','$ptodate','$amount')";
    if (mysqli_query($conn,$sql)) {
      
     echo" <script>
      alert('Room successfully added to the cart');
      window.location.href='mycart.php';
     
     </script>";
    }
  }
    else if($count==0){
      echo"<script>
      alert('Room Not available for desired date Check another date');
      var src='productdetails.php?id=$pid';
      window.location.href=src;
     
     </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  
  }

  if(isset($_POST['check'])){
   
  
    if($count > 0){
     
      echo"<script>
        alert('Available for desired date');
        var src='productdetails.php?id=$pid';
        window.location.href=src;
       
       </script>";
    }
    else if($count == 0){
      echo"<script>
        alert(' Not available for desired date Check another date');
        var src='productdetails.php?id=$pid';
        window.location.href=src;
       
       </script>";
    }
    
}
}

else {
  
  echo"<script>
   alert('please login first')
   window.location.href='login.php';
  
  </script>";
   
    //header("location:login.php");
    
  }
  ?>
