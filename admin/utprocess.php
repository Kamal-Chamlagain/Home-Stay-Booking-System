<?php

if($_POST){
  
    
    $id = $_POST['id'];
    $tname = $_POST['tname'];
   
 
    $tdesg = $_POST["tdesg"];
    
    if($_FILES){
      $filename = $_FILES["image"]["name"];

      $tempname = $_FILES["image"]["tmp_name"];  
  
          $folder = "../images/".$filename; 
          move_uploaded_file($tempname, $folder);
    }
    include('dbconnect.php');
    //"UPDATE productlist SET prod_desc='$pdes', image='".$filename."', pr_weight='$pwt', pr_rate='$rt' WHERE id=$pid";

    $sql = "UPDATE team  SET Name='$tname',Image='".$filename."',Designation='$tdesg' WHERE id=$id and isdelete=0";
    if  (mysqli_query($conn,$sql)) {
      echo"<script>
      alert('Team Successfully updated');
      window.location.href='team.php';
      </script>";
      
    }
     
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}

?>