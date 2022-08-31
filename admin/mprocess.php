<?php
// echo 'hello';
if($_POST){
  
    
   

    $tname= $_POST["tname"];
  
    $desg= $_POST["tdesg"];
    
    if($_FILES){
      $filename = $_FILES["image"]["name"];

      $tempname = $_FILES["image"]["tmp_name"];  
  
          $folder = "../images/".$filename; 
          move_uploaded_file($tempname, $folder);
    }
    include('dbconnect.php');
   
    $sql = "insert into team (Name,Designation,Image) values('$tname','$desg','".$filename."')";
//     $sql2 = "SELECT * FROM team WHERE Name = '".$tname."'";
//     $query1=mysqli_query($conn,$sql2);
//      if($row=mysqli_fetch_assoc($query1)){
 
//          $no = mysqli_num_rows($query1);
//          if($no>0){
//              echo"<script>
//              alert('Member already exist.');
//              window.location.href='adminroom.php';
//              </script>";
//            }
//      }
//    else 
if (mysqli_query($conn,$sql)) {
      echo"<script>
    alert('New memnber Successfully added');
    window.location.href='team.php';
    </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}

?>