<?php
session_start();
$rnames = $_GET['rname'];
$rates = $_GET['rate'];
$cnames = $_GET['cname'];
$fromdates = $_GET['fromdate'];
$todates = $_GET['todate'];
$amounts = $_GET['amount'];
$pid = $_SESSION['userid'];
// $_SESSION['']



$arr1 =  explode(",", $rnames);
$arr2 =  explode(",", $rates);
$arr3 =  explode(",", $cnames);
$arr4 =  explode(",", $fromdates);
$arr5 =  explode(",", $todates);
$arr6 =  explode(",", $amounts);



include('dbconnect.php');
$uname;
 
$sql2 = mysqli_query($conn, "SELECT * FROM customer WHERE id=$pid and isdelete=0");
if ($row = mysqli_fetch_assoc($sql2)) {
$uname=$row['username'];

}
$odate = date("Y-m-d");


for ($i = 0; $i < count($arr1); $i++) {
    $sql = "INSERT into booking (bookdate,uname,rname,cat_name,rate,rFrom,rTO,amount) values('$odate','$uname','$arr1[$i]','$arr3[$i]','$arr2[$i]','$arr4[$i]','$arr5[$i]','$arr6[$i]')";
    $sql3 = mysqli_query($conn, "SELECT * FROM booking WHERE rname='".$arr1[$i]."' and isdelete=0");
    $count=0;
    if(mysqli_num_rows($sql3)==0){
      $count=$count+1;
  
      
    }
    while ($row = mysqli_fetch_assoc($sql3)) {
     
      if($arr4[$i]>=$row['rFrom'] && $arr5[$i] <= $row['rTo'])
      {
        $count = 0;
        break;
      }
      else if($arr4[$i] < $row['rFrom'])
      {
        if($arr5[$i] <= $row['rFrom'])
        {
          $count = $count + 1;
        }
        else if($arr5[$i] > $row['rFrom']){
          $count = 0;
          break;
        }
      
      }
    
      else if($arr4[$i] >= $row['rFrom'])
      {
        if($arr4[$i] >= $row['rTo'])
        {
          $count = $count + 1;
        }
        else if($arr4[$i] < $row['rTo']){
          $count = 0;
          break;
        }
      }
    }
  
if($count>0){
   mysqli_query($conn,$sql);
  
    $sql2="UPDATE cart SET isdelete=1 WHERE uid='$pid' AND rname='".$arr1[$i]."'";
if (mysqli_query($conn,$sql2)) {
   echo" <script>
    alert('Booking is successfull');
    window.location.href='mybooking.php';
    </script>";
 
}
}
else if($count==0){
    echo" <script>
    alert('Room $arr1[$i] is not available for the entered date.Try different date');
    window.location.href='mycart.php'
    </script>";
}
 else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>