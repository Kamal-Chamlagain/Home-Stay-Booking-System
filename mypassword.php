<?php session_start();
if ($_SESSION['userid']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="customcss/user.css"> -->
        <link rel="stylesheet" href="customcss/navbars.css">

        <link rel="stylesheet" href="customcss/myprofile.css">
        <link rel="icon" href="images/main.ico">

        <title>Namuna Home Stay</title>

        </style>
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
                <a href="contact.php">contact</a>
                <?php
                //  session_start();
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
                    <a class="active2" href="mybooking.php"><i class="fas fa-user"></i></a>
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


        <div class="wrapper">
            <div class="sidebar">
                <!-- <h2>Admin Panel</h2> -->
                <ul>
                    <!-- <li ><a href="home.php"><i class="fas fa-home"></i>Home</a></li> -->
                    <!-- <li ><a href="mycart.php"><i class="fas fa-cart-plus "></i> My Cart</a></li> -->
                    <li><a href="mybooking.php"><i class="fas fa-address-card"></i>My Booking</a></li>
                    <li><a href="myprofile.php"><i class="fas fa-user-cog"></i>My Profile</a></li>
                    <li class="active"><a href="mypassword.php"><i class="fas fa-user-lock"></i>Change Password</a></li>


                    <!-- <li><a href="#"><i class="fas fa-map-pin"></i></a></li> -->
                </ul>

            </div>


           
                <div class="container">
                    <form action="passwordprocess.php" method="POST" enctype="multipart/form-data" id="changepassword">
                    <p id="error2" style="color:red;"></p>
                        <div class="row">
                            <div class="col-25">
                                <label for="op">Old Password</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="cupass" name="upass" placeholder="Old Password" required>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-25">
                                <label for="np">New Password</label>
                            </div>
                            <div class="col-75">
                                <input type="password" id="cnpass" name="npass" placeholder="New Password" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="cp">Confirm Password</label>
                            </div>
                            <div class="col-75">
                                <input type="password" id="ccpass" name="cpass" placeholder="Confirm Password"  required>
                            </div>
                        </div>



                        <div class="row">
                            <input type="submit" value="Change" name="submit">
                        </div>
                    </form>
                </div>

        </div>
            <?php include('footers.php') ?>
            <script derfer src="script3.js"></script>
    </body>

    </html>
<?php } else
    header('Location:login.php');
?>