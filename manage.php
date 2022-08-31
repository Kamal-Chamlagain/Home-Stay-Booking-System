
<?php
session_start();
include('dbconnect.php');
if ($_POST) {
  $uid = $_SESSION['userid'];
  $rname = $_POST['rname'];
  $rate = $_POST['rate'];
  $id = $_POST['id'];

    $pfromdate = $_POST['fromDate'];
    $ptodate = $_POST['toDate'];    
    $date1=date_create($pfromdate);
  $date2=date_create($ptodate);

  $diff=date_diff($date1,$date2);
  $no = $diff->format("%a");
    
  $amount = $no * $rate ;
  //echo $no;
  $count =0;

  $sql3 = mysqli_query($conn, "SELECT * FROM booking WHERE rname='".$rname."' and isdelete=0");
  // $sql4 = mysqli_query($conn, "SELECT * FROM orders WHERE rname='".$arr1[$i]."'");
    $count=0;
    if(mysqli_num_rows($sql3)==0){
      $count=$count+1;
  
      
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

  }
  if($count > 0){
    $sql = "UPDATE cart SET rFrom='$pfromdate',rTo='$ptodate',amount='$amount' WHERE id=$id and isdelete=0";
    if (mysqli_query($conn,$sql)) {
        echo" <script>
        alert('Updated');
        window.location.href='mycart.php';

       </script>";
    }
  }
  else if ($count == 0){
    echo" <script>
    alert('Room Not Available for the entered Date. Try different One');
    window.location.href='mycart.php';

   </script>";
  }

?>