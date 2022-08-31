<?php
session_start();
if(isset($_GET['id'])){
   $id = $_GET['id'];
   $pid="";
   if(isset($_SESSION['userid']))
   {
   $pid = $_SESSION['userid'];
   }

    
   include('dbconnect.php');
 $query = mysqli_query($conn,"UPDATE customer SET isdelete=1 WHERE id=$id");
 if($query){
   if($pid == $id){
   unset($_SESSION['userid']);
   }
   
    echo"<script>
    alert('User Successfully removed');
    window.location.href='users.php';
    </script>";
 }
 else{
    echo 'Connection error';
 }
}


?>