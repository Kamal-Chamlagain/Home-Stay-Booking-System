<?php
session_start();
if (isset($_SESSION['valid'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/main.ico">

        <title>Namuna Home Stay</title>

        </style>
    </head>

    <body>


        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <ul class="main">
            <li><a style="font-size:30px;">Namuna Home Stay</a></li>
            <li class="logout"><a href="logout.php" style="font-size:20px;"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>

        <div class="wrapper">
            <div class="sidebar">
                <h2>Admin Panel</h2>
                <ul>
                    <li class="active"><a href="admin.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="order.php"><i class="fas fa-shopping-cart"></i> Booking</a></li>
                    <li><a href="adminroom.php"><i class="fas fa-bed"></i>Rooms</a></li>
                    <li><a href="report.php"><i class="fas fa-file"></i>Reports</a></li>

                    <li><a href="users.php"><i class="fas fa-user"></i>Customers</a></li>
                    <li><a href="message.php"><i class="fas fa-comment-alt"></i>Messages</a></li>
                    <li><a href="slider.php"><i class="fas fa-images"></i>Gallery</a></li>
                    <li><a href="contact.php"><i class="fas fa-address-book"></i>ContactInfo</a></li>
                    <li><a href="team.php"><i class="fas fa-user-friends"></i>Team</a></li>
                    <li><a href="changepassword.php"><i class="fas fa-user-lock"></i>Change Password</a></li>
                  
                </ul>

            </div>



            <div class="roomMain">

                <div class="rooms">
                    <?php
                    include('dbconnect.php');


                    $query = mysqli_query($conn, "SELECT * FROM customer where isdelete=0");
                    $query1 = mysqli_query($conn, "SELECT * FROM room where isdelete=0");

                    $query3 = mysqli_query($conn, "SELECT * FROM booking where isdelete=0");
                    $query4 = mysqli_query($conn, "SELECT * FROM review where isdelete=0");

                    $cno = mysqli_num_rows($query);
                    $rcno =  mysqli_num_rows($query1);

                    $ono = mysqli_num_rows($query3);
                    $mno = mysqli_num_rows($query4);
                    ?>

                    <div class="card1">

                        <p class="price"><?php echo $cno ?></p>
                        <h2>Customers</h2>

                        <a href="users.php"><button>View More</button></a>

                    </div>
                    <div class="card2">

                        <p class="price"><?php echo $rcno ?></p>
                        <h2>Rooms</h2>

                        <a href="adminroom.php"><button>View More</button></a>

                    </div>

                    <div class="card3">

                        <p class="price"><?php echo $ono ?></p>
                        <h2>Bookings </h2>

                        <a href="order.php"><button>View More</button></a>

                    </div>
                    <div class="card4">

                        <p class="price"><?php echo $mno ?></p>
                        <h2>Messages</h2>

                        <a href="message.php"><button>View More</button></a>

                    </div>



                </div>
            </div>
        </div>

    </body>

    </html>
<?php } else {
    header('Location:index.php');
} ?>