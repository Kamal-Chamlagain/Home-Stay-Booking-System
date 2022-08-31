<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="all.css"> -->
  <link rel="stylesheet" href="customcss/navbars.css">
  <link rel="stylesheet" href="customcss/aboutus.css">
  <!-- <link rel="stylesheet" href="customcss/footer.css">
  <link rel="stylesheet" href="customcss/gallery.css"> -->
  <link rel="icon" href="images/main.ico">
  <title>Namuna Homestay</title>
</head>

<body>
  <!-- 
  <nav class="navbar">
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
  </nav> -->

  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">Namuna Home Stay</a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a class="active"href="aboutus.php">about</a>
            <a href="rooms.php">rooms</a>
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

            <a  href="mycart.php"><i class="fas fa-shopping-cart"><sup><?php echo $no ?></sup></i></a>
            <a  href="mybooking.php"><i class="fas fa-user"></i></a>
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

  <div class="section">
		<div class="container">
			<div class="content-section">
				<div class="title">
					<h1>About Us</h1>
				</div>
				<div class="content">
					<h3>Namuna Home Stay</h3>
					<p style="text-align:justify;">Namuna Home Stay is the model community home stay established inside the community farm of Nepal. It is agro tourism home stay of Nepal. It was established in 2077 B.S. to promote the farm-based tourism or agro tourism. It is located at <?php

include('dbconnect.php');


$query = mysqli_query($conn, "SELECT * FROM contactinfo");
while ($row = mysqli_fetch_assoc($query)) { echo $row['address'];}

?>. People from all over come here to visit this place, to learn the method and methodologies of the operational status of this farm. The main goal of this home stay is to provide the better accommodations for the visitors. In spite of this, official person of the country only know this place by the direct and indirect involvement.</p>
				
				</div>
			
			</div>
			<div class="image-section">
				<img src="images/farm.jpg">
			</div>
		</div>
   
	</div>
 
  <div class="testimonials">
        <div class="innner">
            <h1>Our Team</h1>
            <div class="border">

                
            </div>
        

            <div class="row">
            <?php 
         
         include('dbconnect.php');


         $query = mysqli_query($conn, "SELECT * FROM team where isdelete=0");
         while ($row = mysqli_fetch_assoc($query)) {

         ?>
                <div class="col">
                    <div class="testimonial">
                        <img src="images/<?php echo $row['Image']?>" alt="photo">
                        <div class="name"><?php echo $row['Designation']?></div>
                        <h3><?php echo $row['Name']?></h2>
                       
                       
                    </div>

                </div>
                <?php } ?>
                <!-- <div class="col">
                    <div class="testimonial">
                        <img src="images/2.jpg" alt="photo">
                        <div class="name">Vice Chairman</div>
                        <h3>Kamal Chamlagain</h2>
                       
                        
                    </div>

                </div>
                <div class="col">
                    <div class="testimonial">
                        <img src="images/2.jpg" alt="photo">
                        <div class="name">Secreatary</div>
                        <h3>Kamal Chamlagain</h2>
                                                 
                    </div>

                </div> -->
              
            </div>

        </div>
    </div>
  

  <?php include('footers.php')?>
</body>

</html>