<?php
if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include('dbconnect.php');

   $status="";
   $query1="";
   $query2="";
 
$sql2 = mysqli_query($conn, "SELECT * FROM booking WHERE bookid=$id and isdelete=0");
if ($row = mysqli_fetch_assoc($sql2)) {
$status=$row['status'];

}
if($status =="Checked Out")
{
  $query2 = mysqli_query($conn,"UPDATE booking SET udelete =1 WHERE bookid=$id"); 
 
}
if($status!="Checked Out")
{

 $query1 = mysqli_query($conn,"UPDATE booking SET isdelete =1 WHERE bookid=$id");
}

 if($query1 || $query2){ 
 

   echo"<script>
   alert('Booking removed');
   window.location.href='mybooking.php';
   </script>";
 }
 else{
    echo 'Connection error';
 }
}


?>