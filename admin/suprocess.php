<?php

if($_POST){
  
    
    $id = $_POST['id'];
  
    
    if($_FILES){
      $filename = $_FILES["simage"]["name"];

      $tempname = $_FILES["simage"]["tmp_name"];  
  
          $folder = "../images/".$filename; 
          move_uploaded_file($tempname, $folder);
    }
    include('dbconnect.php');
    //"UPDATE productlist SET prod_desc='$pdes', image='".$filename."', pr_weight='$pwt', pr_rate='$rt' WHERE id=$pid";

    $sql = "UPDATE gallery SET images='".$filename."' WHERE id=$id";
    
            if (mysqli_query($conn,$sql)) {
            echo"<script>
            alert('Gallery Successfully updated');
            window.location.href='slider.php';
            </script>";
            }
           
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}

?>