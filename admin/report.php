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
        <style>
            .card1 h2,.card2 h2,.card3 h2{
                margin-top:20px;
            }
            #dreport{
                margin:20px;
            }
            
        </style>

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
                    <li><a href="admin.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="order.php"><i class="fas fa-shopping-cart"></i> Booking</a></li>
                    <li><a href="adminroom.php"><i class="fas fa-bed"></i>Rooms</a></li>
                    <li class="active"><a href="report.php"><i class="fas fa-file"></i>Reports</a></li>

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


                    $query = mysqli_query($conn, "SELECT uname, COUNT(uname) AS `value_occurrence`  FROM  booking                                      GROUP BY uname
                                             ORDER BY `value_occurrence` DESC
                                         LIMIT    1;");

                    $uname = "";
                    while ($row = mysqli_fetch_assoc($query)) {
                        $uname = $row['uname'];
                    }



                    $query2 = mysqli_query($conn, " SELECT rname, COUNT(rname) AS `value_occurrence`  FROM  booking                                      GROUP BY uname
                      ORDER BY `value_occurrence` DESC
                  LIMIT    1;");
                    $rname = "";
                    while ($row = mysqli_fetch_assoc($query2)) {
                        $rname = $row['rname'];
                    }

                    $query3 = mysqli_query($conn, "SELECT rname,
                                                COUNT(rname) AS value_occurrence
                                            FROM booking
                                            GROUP BY rname
                                            HAVING COUNT(value_occurrence) <= ALL(
                                                SELECT COUNT(rname)
                                                FROM booking
                                                GROUP BY rname
                                            )");
                    $lrname = "";
                    while ($row = mysqli_fetch_assoc($query3)) {
                        $lrname = $row['rname'];
                    }





                    ?>

                    <div class="card1">


                        <h2>Frequent Customer</h2>

                        <p class="price2"><?php echo $uname ?></p>

                    </div>
                    <div class="card2">


                        <h2>Most Booking Room </h2>
                        <p class="price2"><?php echo $rname ?></p>



                    </div>
                    <div class="card3">


                        <h2>Least Booking Room </h2>
                        <p class="price2"><?php echo $lrname ?></p>



                    </div>





                </div>
                <a href="datereport.php"><button id="dreport">Date Wise Report</button></a>
             
            </div>

          


        </div>
                    

    </body>

    </html>
<?php } else {
    header('Location:index.php');
} ?>