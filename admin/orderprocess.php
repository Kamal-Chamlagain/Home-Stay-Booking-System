<?php
include('dbconnect.php');

if($_POST['submit']){

$cname=$_POST['cname'];
$rname = $_POST['rname'];
$rtype="";
$rate="";
$ptodate=$_POST['toDate'];
$pfromdate=$_POST['fromDate'];

$date1=date_create($ptodate);
$date2=date_create($pfromdate);
$diff=date_diff($date1,$date2);
$no = $diff->format("%a");
$sql4 = mysqli_query($conn, "SELECT * FROM room WHERE rname='".$rname."' and isdelete=0");

$odate = date("Y-m-d");

while ($row = mysqli_fetch_assoc($sql4))
{
$rtype = $row['cat_name'];
$rate = $row['rate'];
}
$amount =$rate*$no;

// $rname = $_POST['rname'];
// $pid=$_POST['id'];
// $ptodate=$_POST['toDate'];
// $pfromdate=$_POST['fromDate'];
$count =0;
$row2 = 0;


$sql3 = mysqli_query($conn, "SELECT * FROM booking WHERE rname='".$rname."' and isdelete=0");
$row2 = mysqli_num_rows($sql3);
 if($row2== 0){
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
   
   
    if($count > 0){
      $sql = "INSERT into booking (bookdate,uname,rname,cat_name,rate,rFrom,rTO,amount) values('$odate','$cname','$rname','$rtype','$rate','$pfromdate','$ptodate','$amount')";

      // mysqli_query($conn,$sql);
    if (mysqli_query($conn,$sql)) {
      
     echo" <script>
      alert('Booking Successful')
      window.location.href='order.php';
     
     </script>";
    }
  }
    else if($count==0){
      echo"<script>
      alert('Room Not available for desired date Check another date');
      var src='addbooking.php';
      window.location.href=src;
     
     </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  
  }


  ?>
