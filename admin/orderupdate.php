<?php

if($_POST){
    include('dbconnect.php');
    
    $id = $_POST['id'];
   $svalue = $_POST['status'];
    
 
    
    
   
    //"UPDATE productlist SET prod_desc='$pdes', image='".$filename."', pr_weight='$pwt', pr_rate='$rt' WHERE id=$pid";

    $sql = "UPDATE booking SET status='$svalue'WHERE bookid=$id and isdelete=0";
   if (mysqli_query($conn,$sql)) {
      echo"<script>
      alert('Booking Status Successfully updated');
      window.location.href='order.php';
      </script>";
      
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}

?>