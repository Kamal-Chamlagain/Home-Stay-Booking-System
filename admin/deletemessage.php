<?php
if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include('dbconnect.php');
 $query = mysqli_query($conn,"UPDATE  review SET isdelete=1 WHERE id=$id");
 if($query){
   
    echo"<script>
    alert('messages Successfully removed');
    window.location.href='message.php';
    </script>";
 }
 else{
    echo 'Connection error';
 }
}


?>