<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Namuna Home Stay</title>
  <link rel="stylesheet" href="adminlogin.css">
  <link rel="icon" href="img/main.ico">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form action="adminlogin.php" method="POST" enctype="multipart/form-data">
  <div class="form-field">
    <input type="email" placeholder="Email / Username" name="uemail" required/>
  </div>
  
  <div class="form-field">
    <input type="password" placeholder="Password" name="upass" required/>                         </div>
  
  <div class="form-field">
    <button class="btn" type="submit">Log in</button>
  </div>
</form>
<!-- partial -->
  
</body>
</html>
