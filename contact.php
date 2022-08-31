<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customcss/contactus.css">
   
    <link rel="stylesheet" href="customcss/navbars.css">
    <link rel="icon" href="images/main.ico">
    <title>Namuna Home Stay</title>
</head>
<body>


<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">Namuna Home Stay</a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="aboutus.php">about</a>
            <a href="rooms.php">rooms</a>
            <a class="active"href="contact.php">contact</a>
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


<!-- Main Content -->
    <div class="container">
        
       
        <div class="row">
          <div class="column">
            <img src="images/farm.jpg">
          </div>
          <div class="column">
            <center><h2 id="rus">Review Us</h2></center>
            <form action="contactprocess.php" method="POST" enctype="multipart/form-data" id="reviewForm">
              <p id="rerror" style="color:red;"></p>
              <label for="fname">First Name</label>
              <input type="text" id="rname" name="uname" placeholder="Your name..">
              <label for="subject">Subject</label>
              <input type="text" id="rsubject" name="subject" placeholder="Title...">                          
              <label for="message">Message</label>
              <textarea id="subject" name="message" placeholder="Write message.." style="height:170px"></textarea>
              <input type="submit" value="Sent Review">
            </form>
          </div>
          <div><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3503.1841427526565!2d87.6862894!3d26.5769937!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e585589f19b3fd%3A0x78bf7e0126dbbd07!2sNamuna%20kheti!5e1!3m2!1sen!2snp!4v1660367870016!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
        <div style="text-align:center">
        <?php

			include('dbconnect.php');


			$query = mysqli_query($conn, "SELECT * FROM contactinfo");
			while ($row = mysqli_fetch_assoc($query)) {

			?>
        
          <h2>Contact Information</h2>
          <h3>Adress:<?php echo $row['address']?></h3>
          <h3>Email:<?php echo $row['email']?></h3>
          <h3>Phone Number:<?php echo $row['phone']?></h3>
          <?php } ?>
        </div>
      </div>


      <!-- footer -->
      <!-- <footer>
        <div class="frow">
          <div class="col4">
            <div class="ftext">
              <h1>Get our app on </h1>
            </div>
            <div class="aplogo">
              <img src="images/meals.jpg" alt="">
             
            </div>
          </div>
          <div class="col4">
            <div class="faimg">
              <img src="images/meals.jpg" alt="">
            </div>
            <div class="fatext">
              <p>NASK-Namuna Sahakari Kheti was established in 2070 B.S. It is the 
                model community farm of Nepal as well as it is listed in the 100 destination for tourism by Governmnet of 
                Nepal. It is located in the easter Nepal. It is inside the Gauradaha Municipality of Jhapa District.
              </p>
            </div>
          </div>
          <div class="col4">
            <h1>Useful Links</h1>
            <li><a href="">Privacy Policy</a></li>
            <li><a href="">Privacy Policy</a></li>
            <li><a href="">Privacy Policy</a></li>
            <li><a href="">Privacy Policy</a></li>
          </div>
        </div>
      </footer> -->

      <?php include("footers.php")?>
       <!-- Script for responsive Navbar -->
    <script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
  </script>
 <script>
        const rname = document.getElementById('rname');
        const rsubject = document.getElementById('rsubject');
    const rform3 = document.getElementById('reviewForm');
    const rerrorElement3 = document.getElementById('rerror');
    var regex = /^[a-zA-Z ]{2,30}$/;

    rform3.addEventListener('submit', (e) => {
      let messages = [];
      const ra = regex.test(rname.value);
      const rs= regex.test(rsubject.value);
      

      if (!ra) {
        messages.push("Invalid Name!");
      }
      else if(!rs){
        messages.push("Invalid Subject!");
      }

      if (messages.length > 0) {
        e.preventDefault();
        rerrorElement3.innerText = messages.join("\n");
      }
    })
      </script>

</body>
</html>