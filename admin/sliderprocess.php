<?php
// echo 'hello';
if($_POST){
        
    
    if($_FILES){
      $filename = $_FILES["simage"]["name"];

      $tempname = $_FILES["simage"]["tmp_name"];  
  
          $folder = "../images/".$filename; 
          move_uploaded_file($tempname, $folder);
    }
    include('dbconnect.php');
   
    $sql = "insert into gallery (images) values('".$filename."')";

    if (mysqli_query($conn,$sql)) {
        echo"<script>
      alert('New photo Successfully added');
      window.location.href='slider.php';
      </script>";
      } 
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      
      mysqli_close($conn);
}