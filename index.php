<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="customcss/navbars.css">
    <link rel="stylesheet" href="customcss/footer.css">
    <link rel="stylesheet" href="all.css">
    <link rel="icon" href="images/main.ico">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
    <title>Namuna Home Stay</title>
    <style>
        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
            width: 100%;
            height: 500px;
        }

        /* Slideshow container */
        .slideshow-container {
            max-height: 500px;
            height: auto;
            /* position: relative; */
            margin-top: 70px;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px;
            }
        }
    </style>

</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">Namuna Home Stay</a>

        <nav class="navbar">
            <a class="active" href="index.php">home</a>
            <a href="aboutus.php">about</a>
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


    <div class="slideshow-container">

        <?php 
         
         include('dbconnect.php');


         $query = mysqli_query($conn, "SELECT * FROM gallery where isdelete=0");
         while ($row = mysqli_fetch_assoc($query)) {

         ?>
        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="images/<?php echo $row['images'];?>" style="width:100%">

        </div>
        <?php } ?>
        


    </div>

    <br>

    <div style="text-align:center">
    <?php 
         
         include('dbconnect.php');


         $query = mysqli_query($conn, "SELECT * FROM gallery where isdelete=0");
         while ($row = mysqli_fetch_assoc($query)) {

         ?>
        <span class="dot"></span>
        <?php } ?>
        
    </div>


    <div class="feature">
        <h2 id="fea">Featured Rooms</h2>
        <div class="rooms">

            <?php
            include('dbconnect.php');


            $query = mysqli_query($conn, "SELECT * FROM room where isdelete=0 order by id desc LIMIT 3");
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
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>

</body>

</html>