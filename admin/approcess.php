<?php
   //session_start();
if($_POST){
  
    //$pid = $_SESSION['userid'];
  
   $upass = $_POST['aopass'];
   $npass = $_POST['apass'];
   $cpass = $_POST['acpass'];
    
    
    include('dbconnect.php');
  
    $sql = "SELECT password FROM admin";

    $sql2 = "UPDATE admin SET password='$npass' WHERE id=1 ";

    $query1=mysqli_query($conn,$sql);
     if($row=mysqli_fetch_assoc($query1)){
 
        $pass = $row['password'];
         if($pass==$upass){

        if (mysqli_query($conn,$sql2)) {
         echo"<script>
         alert('password Successfully updated');
         window.location.href='admin.php';
        </script>";
      
             }
            }
            else if($pass!=$upass){
                echo"<script>
         alert('current password not matched');
         window.location.href='changepassword.php';
        </script>";
            }
    } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}



?>