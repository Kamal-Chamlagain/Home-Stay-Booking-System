<?php session_start();
if ($_SESSION['userid']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="customcss/user.css">
        <link rel="stylesheet" href="customcss/navbars.css">

        <link rel="icon" href="images/main.ico">
        <!-- <link rel="stylesheet" href="customcss/home.css"> -->
        <!-- <link rel="stylesheet" href="customcss/footer.css"> -->
        <!-- <link rel="stylesheet" href="customcss/order.css"> -->
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
                $query = mysqli_query($conn, "SELECT * FROM cart WHERE uid=$pid and isdelete=0 ");
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

                    <li class="active"><a href="mybooking.php"><i class="fas fa-address-card"></i>My Booking</a></li>
                    <li><a href="myprofile.php"><i class="fas fa-user-cog"></i>My Profile</a></li>
                    <li><a href="mypassword.php"><i class="fas fa-user-lock"></i>Change Password</a></li>

                    <!-- <li><a href="#"><i class="fas fa-map-pin"></i></a></li> -->
                </ul>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>My Booking</h2>

                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Booking Id</td>
                                <td>Booking Date</td>
                                <td>
                                    Room Name
                                </td>

                                <td>
                                    Room Type
                                </td>
                                <td>
                                    Rate
                                </td>
                                <td>
                                    CheckIn Date
                                </td>
                                <td>CheckOut Date</td>
                                <td>
                                    Total
                                </td>
                                <td>
                                    Status
                                </td>

                                <td>
                                    Action
                                </td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            //session_start();
                            $pid = $_SESSION['userid'];

                            // $_SESSION['']
                            include('dbconnect.php');
                            $query2 = mysqli_query($conn, "SELECT * FROM customer WHERE id=$pid and isdelete=0");
                            $uname = "";
                            while ($row3 = mysqli_fetch_assoc($query2)) {
                                $uname = $row3['username'];
                            }

                            $query = mysqli_query($conn, "SELECT * FROM booking WHERE uname='" . $uname . "' and isdelete=0 and udelete=0");

                            while ($row2 = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row2['bookid'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['bookdate'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['rname'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['cat_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['rate'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['rFrom'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['rTo'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['amount'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row2['status'] ?>
                                    </td>

                                    <td>
                                        <?php if ($row2['status'] != "Checked In") { ?>
                                            <a href="removebooking.php?id=<?php echo $row2['bookid'] ?>" onclick="return checkDelete();"><i class='fas fa-trash' style='font-size:25px;color:red'></i></a>
                                        <?php } else { ?>
                                            <a href="#" onclick="nDelete();"><i class='fas fa-trash' style='font-size:25px;color:red'></i></a>
                                        <?php   } ?>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

        <?php include('footers.php') ?>

        <script>
            function checkDelete() {
                return confirm('Are You sure to remove your booking?');
            }
            function nDelete(){
                alert("You cannot remove this booking");
            }
        </script>
    </body>

    </html>
<?php } else
    header('Location:login.php');
?>