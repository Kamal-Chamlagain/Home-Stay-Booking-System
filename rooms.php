<html>

<head>
  <link rel="stylesheet" href="all.css">
  <link rel="stylesheet" href="customcss/navbars.css">
  <link rel="icon" href="images/main.ico">
  <title>Namuna Home Stay</title>
</head>

<body>
  <!-- <nav class="navbar">
    <div class="logo">Namuna Home Stay</div>

    <ul class="nav-links">

      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>

      <div class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="rooms.php">Our Rooms</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </div>
    </ul>
  </nav>-->
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo">Namuna Home Stay</a>

    <nav class="navbar">
      <a href="index.php">home</a>
      <a href="aboutus.php">about</a>
      <a class="active" href="rooms.php">rooms</a>
      <a href="contact.php">contact</a>
      <?php
      session_start();
      if (!isset($_SESSION['userid'])) {
      ?>
        <a href="login.php">login</a>
      <?php } ?>
    </nav>
    <?php

    if (isset($_SESSION['userid'])) {
      $pid = $_SESSION['userid'];

      // $_SESSION['']
      include('dbconnect.php');
      $query = mysqli_query($conn, "SELECT * FROM cart WHERE uid=$pid and isdelete=0");
      $no = 0;
      $no = mysqli_num_rows($query);


    ?>
      <div class="icons">

        <a href="mycart.php"><i class="fas fa-shopping-cart"><sup><?php echo $no ?></sup></i></a>
        <a href="mybooking.php"><i class="fas fa-user"></i></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>

      </div>

    <?php
    }
    ?>
    <!-- <div class="icons">
    
            <a href="mycart.php" ><i class="fas fa-shopping-cart"></i></a>
            <a href="mybooking.php" ><i class="fas fa-user"></i></a>
            <a href="logout.php" style="font-size:20px;"><i class="fas fa-sign-out-alt"></i></a>
           
        </div> -->

  </header>

  <div class="roomMain">
    <h1>Our Rooms</h1>
    <div class="rooms">
      <?php
      include('dbconnect.php');


      $query = mysqli_query($conn, "SELECT * FROM room where isdelete=0");
      while ($row = mysqli_fetch_assoc($query)) {

      ?>
        <div class="card">
          <form action="productdetails.php" method="POST" enctype="multipart/form-data">

            <img src="images/<?php echo $row['image'] ?>" alt="Denim Jeans" style="width:100%;height:200px;">
            <input type="hidden" value="<?php echo $row['id'] ?>" name="rid">
            <h2><?php echo $row['rname'] ?></h2>
            <h3><?php echo $row['cat_name'] ?></h3>
            <p class="price">Rs.<?php echo $row['rate']; ?></p>
            <p><button type="submit" name="submit">View Rooms</button></p>
          </form>
        </div>
      <?php } ?>


    </div>
  </div>
  <?php include("footers.php") ?>
  <!-- <footer>
    <div class="frow">

      <div class="col4">
        <div class="faimg">
          <img src="images/farm.jpg" alt="">
        </div>
        <div class="fatext">
          <p>NHS-Namuna Home Stay was established in 2070 B.S. It is the
            model community home saty of Nepal as well as it is listed in the 100 destination for tourism by Governmnet of
            Nepal. It is located in the easter Nepal. It is inside the Gauradaha Municipality of Jhapa District.
          </p>
        </div>
      </div>

    </div>
  </footer> -->


</body>

</html>