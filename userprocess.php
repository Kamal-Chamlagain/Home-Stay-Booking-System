<?php
 session_start();
 $pid = $_SESSION['userid'];
if($_POST){
  $cname = $_POST['uname'];
  $cemail = $_POST['uemail'];
  $caddress = $_POST['uaddress'];
  $cphone = $_POST['uphone'];
    
   
    
    
    include('dbconnect.php');
    

    $sql = "UPDATE customer SET username='$cname',uaddress='$caddress',uphone='$cphone',email='$cemail' WHERE id=$pid";

// $query1 = mysqli_query($conn, "SELECT * FROM register WHERE username='".$cname."'  AND email='".$cemail."' AND isAdmin=0");
//     $no = mysqli_num_rows($query1);
   
//     if($no>0){
//       echo"<script>
//       alert('This record already exists')
//       window.location.href='myprofile.php';
     
//      </script>";
//     }
// else 
$sql2 = "SELECT * FROM customer WHERE id = $pid and isdelete=0";
    $query1=mysqli_query($conn,$sql2);
     if($row=mysqli_fetch_assoc($query1)){
        $oemail = $row['email'];
        $ophone =$row['uphone'];
        // $no = mysqli_num_rows($query1);
         if($cemail!=$oemail){
          $sql3 = "SELECT * FROM customer WHERE email= '".$cemail."' and isdelete=0";
          $query2=mysqli_query($conn,$sql3);
           $no = mysqli_num_rows($query2);
           if($no>0)
           {
            echo"<script>
            alert('Email already exist.');
            window.location.href='updateuser.php?id=$pid';
            </script>";

           }
           else{
            if (mysqli_query($conn,$sql)) {
            echo"<script>
            alert('Profile Successfully updated');
            window.location.href='adminroom.php';
            </script>";
            }
           }
           
            
           
          } 
          else if($cphone!=$ophone){
            $sql4 = "SELECT uphone FROM customer WHERE uphone='".$cphone."' and isdelete=0";
            $query3= mysqli_query($conn,$sql4);
            $no1=mysqli_num_rows($query3);
            if($no1>0)
           {
            echo"<script>
            alert('Phone Number already exist.');
            window.location.href='updateuser.php?id=$pid';
            </script>";

           }
           else{
            if (mysqli_query($conn,$sql)) {
            echo"<script>
            alert('Profile Successfully updated');
            window.location.href='adminroom.php';
            </script>";
            }
           }

          }

          else

        if (mysqli_query($conn,$sql)) {
          echo"<script>
          alert('Details  Successfully updated');
          window.location.href='myprofile.php';
          </script>";
      
    }
  }
     else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}

?>