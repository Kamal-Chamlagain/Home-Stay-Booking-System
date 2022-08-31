<?php
if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include('dbconnect.php');
 $query = mysqli_query($conn,"UPDATE team SET isdelete=1 WHERE Id=$id");
//  $query2 = mysqli_query($conn,"UPDATE cart SET isdelete=1 WHERE rname=$id");
 if($query){ 
   echo"<script>
   alert('Member Successfully removed');
   window.location.href='team.php';
   </script>";
 }
 else{
    echo 'Connection error';
 }
}


?>