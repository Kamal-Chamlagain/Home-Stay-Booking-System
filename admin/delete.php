<?php
if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include('dbconnect.php');
 $query = mysqli_query($conn,"UPDATE room SET isdelete=1 WHERE id=$id");
//  $query2 = mysqli_query($conn,"UPDATE cart SET isdelete=1 WHERE rname=$id");
 if($query){ 
   echo"<script>
   alert('Room Successfully removed');
   window.location.href='adminroom.php';
   </script>";
 }
 else{
    echo 'Connection error';
 }
}


?>