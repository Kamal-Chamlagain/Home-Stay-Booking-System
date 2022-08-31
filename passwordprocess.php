<?php
   session_start();
if($_POST){
  
    $pid = $_SESSION['userid'];
  
   $upass = $_POST['upass'];
   $npass = $_POST['npass'];
   $cpass = $_POST['cpass'];
    
    
    include('dbconnect.php');
  
    $sql = "SELECT password FROM customer WHERE id=$pid and isdelete=0";

    $sql2 = "UPDATE customer SET password='$npass' WHERE id=$pid and isdelete=0";

    $query1=mysqli_query($conn,$sql);
     if($row=mysqli_fetch_assoc($query1)){
 
        $pass = $row['password'];
         if($pass==$upass){

        if (mysqli_query($conn,$sql2)) {
         echo"<script>
         alert('password Successfully updated');
         window.location.href='myprofile.php';
        </script>";
      
             }
            }
            else if($pass!=$upass){
                echo"<script>
         alert('current password not matched');
         window.location.href='mypassword.php';
        </script>";
            }
    } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}



?>