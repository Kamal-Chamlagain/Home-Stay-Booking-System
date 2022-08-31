<?php
if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include('dbconnect.php');
 $query = mysqli_query($conn,"UPDATE gallery SET isdelete=1 WHERE id=$id");
//  $query2 = mysqli_query($conn,"UPDATE cart SET isdelete=1 WHERE rname=$id");
 if($query){ 
   echo"<script>
   alert('Image Successfully removed');
   window.location.href='slider.php';
   </script>";
 }
 else{
    echo 'Connection error';
 }
}


?>