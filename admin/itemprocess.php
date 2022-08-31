<?php
// echo 'hello';
if($_POST){
  
    
   
    $type = $_POST["rtype"];
    $rate = $_POST["rate"];
    $rname= $_POST["rname"];
  
    $desc = $_POST["desc"];
    
    if($_FILES){
      $filename = $_FILES["image"]["name"];

      $tempname = $_FILES["image"]["tmp_name"];  
  
          $folder = "../images/".$filename; 
          move_uploaded_file($tempname, $folder);
    }
    include('dbconnect.php');
   
    $sql = "insert into room (rname,cat_name,rate,description,image) values('$rname','$type','$rate','$desc','".$filename."')";
    $sql2 = "SELECT * FROM room WHERE rname = '".$rname."' and isdelete=0";
    $query1=mysqli_query($conn,$sql2);
     if($row=mysqli_fetch_assoc($query1)){
 
         $no = mysqli_num_rows($query1);
         if($no>0){
             echo"<script>
             alert('Room already exist.');
             window.location.href='adminroom.php';
             </script>";
           }
     }
   else if (mysqli_query($conn,$sql)) {
      echo"<script>
    alert('New Room  Successfully added');
    window.location.href='adminroom.php';
    </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}

?>