<?php
session_start();
if (isset($_SESSION['valid'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="order.css">


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
                    <li><a href="admin.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="order.php"><i class="fas fa-shopping-cart"></i> Booking</a></li>
                    <li><a href="adminroom.php"><i class="fas fa-bed"></i>Rooms</a></li>
                    <li><a href="report.php"><i class="fas fa-file"></i>Reports</a></li>
                    <li><a href="users.php"><i class="fas fa-user"></i>Customers</a></li>
                    <li class="active"><a href="message.php"><i class="fas fa-comment-alt"></i>Messages</a></li>
                    <li><a href="slider.php"><i class="fas fa-images"></i>Gallery</a></li>
                    <li><a href="contact.php"><i class="fas fa-address-book"></i>ContactInfo</a></li>
                    <li><a href="team.php"><i class="fas fa-user-friends"></i>Team</a></li>
                    <li><a href="changepassword.php"><i class="fas fa-user-lock"></i>Change Password</a></li>

                </ul>

            </div>

        </div>

        <div class="header">
            <h2>Messages From Customer</h2>
        </div>
        <div class="container">
            <table id="table1" style="width:100%;">
                <tr class="firstrow">
                    <th>
                        Customer Name
                    </th>
                    <th>
                      Posting Date
                    </th>

                    <th>
                        Subject
                    </th>
                    <th>
                        Messages
                    </th>
                  


                    <th>
                        Action
                    </th>


                </tr>

                <?php


                // $_SESSION['']
                include('dbconnect.php');
                $query = mysqli_query($conn, "SELECT * FROM review where isdelete=0 order by pdate desc");

                while ($row2 = mysqli_fetch_assoc($query)) {
                ?>
                    <tr class="secondrow">
                        <td>
                            <?php echo $row2['username'] ?>

                        </td>
                        <td>
                            <?php echo $row2['pdate'] ?>
                        </td>

                        <td>
                            <?php echo $row2['subject'] ?>
                        </td>
                        <td>
                            <?php echo $row2['message'] ?>
                        </td>
                        <td>
                            <a href="deletemessage.php?id=<?php echo $row2['id'] ?>" onclick="return checkDelete();"><i class='fas fa-trash' style='font-size:25px;color:red'></i></a>
                        </td>

                    </tr>
                <?php } ?>
            </table>

        </div>


    </body>

    <script>
        function checkDelete() {
            return confirm("Do you want to remove this review?")
        }
    </script>

    </html>
<?php } else {
    header('Location:index.php');
} ?>