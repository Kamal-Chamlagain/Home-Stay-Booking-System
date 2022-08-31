<?php

if($_POST){
  
    
    $id = $_POST['id'];
    $rname = $_POST['rname'];
   
    $type = $_POST["rtype"];
    $rate = $_POST["rate"];
    
    $desc = $_POST["desc"];
    
    if($_FILES){
      $filename = $_FILES["image"]["name"];

      $tempname = $_FILES["image"]["tmp_name"];  
  
          $folder = "../images/".$filename; 
          move_uploaded_file($tempname, $folder);
    }
    include('dbconnect.php');
    //"UPDATE productlist SET prod_desc='$pdes', image='".$filename."', pr_weight='$pwt', pr_rate='$rt' WHERE id=$pid";

    $sql = "UPDATE room SET rname='$rname',cat_name='$type',rate='$rate',image='".$filename."',description='$desc' WHERE id=$id and isdelete=0";
    $sql2 = "SELECT * FROM room WHERE id = $id and isdelete=0";
    $query1=mysqli_query($conn,$sql2);
     if($row=mysqli_fetch_assoc($query1)){
        $orname = $row['rname'];
        // $no = mysqli_num_rows($query1);
         if($rname!=$orname){
          $sql3 = "SELECT * FROM room WHERE rname= '".$rname."'";
          $query2=mysqli_query($conn,$sql3);
           $no = mysqli_num_rows($query2);
           if($no>0)
           {
            echo"<script>
            alert('Room already exist.');
            window.location.href='adminroom.php';
            </script>";

           }
           else{
            if (mysqli_query($conn,$sql)) {
            echo"<script>
            alert('Room Successfully updated');
            window.location.href='adminroom.php';
            </script>";
            }
           }
            
           }
           else
   if (mysqli_query($conn,$sql)) {
      echo"<script>
      alert('Room Successfully updated');
      window.location.href='adminroom.php';
      </script>";
      
    }
     }
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}

?>