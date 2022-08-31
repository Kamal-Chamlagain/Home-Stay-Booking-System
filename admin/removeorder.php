<?php
if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include('dbconnect.php');
 $query = mysqli_query($conn,"UPDATE booking SET isdelete=1 WHERE bookid=$id");
 if($query){ 
   echo"<script>
   alert('Room Successfully removed');
   window.location.href='order.php';
   </script>";
 }
 else{
    echo 'Connection error';
 }
}


?>