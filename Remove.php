<?php
session_start();
$uid = $_SESSION['userid'];
if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include('dbconnect.php');
 $query = mysqli_query($conn,"UPDATE cart SET isdelete=1 WHERE id= $id");
 if($query){
    echo"<script>
    alert('Room successfully removed from cart');
    window.location.href='mycart.php';
    </script>";
 }
 else{
    echo 'Connection error';
 }
}


?>