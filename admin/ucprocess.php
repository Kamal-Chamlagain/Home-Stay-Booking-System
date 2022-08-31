<?php

if($_POST){
  
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    
    
    include('dbconnect.php');
    //"UPDATE productlist SET prod_desc='$pdes', image='".$filename."', pr_weight='$pwt', pr_rate='$rt' WHERE id=$pid";

    $sql = "UPDATE contactinfo SET email='$email',phone='$phone',address='$address' WHERE id=$id";
    
            if (mysqli_query($conn,$sql)) {
            echo"<script>
            alert('Contact info Successfully updated');
            window.location.href='contact.php';
            </script>";
            }
           
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}

?>