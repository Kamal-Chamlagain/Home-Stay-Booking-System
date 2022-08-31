<?php
session_start();
if (isset($_SESSION['valid'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link rel="icon" href="img/main.ico">
        <link rel="stylesheet" href="order.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <title>Namuna Home Stay</title>
        <style>
            #myInput {

                /* background-position: 10px 10px; */
                background-repeat: no-repeat;
                width: 20%;
                font-size: 14px;
                padding: 12px 20px 12px 10px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
                margin-top: 10px;
                margin-left: 20px;
                border-radius: 10px;
                font-family: FontAwesome;


            }
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
                    <li class="active"><a href="users.php"><i class="fas fa-user"></i>Customers</a></li>
                    <li><a href="message.php"><i class="fas fa-comment-alt"></i>Messages</a></li>
                    <li><a href="slider.php"><i class="fas fa-images"></i>Gallery</a></li>
                    <li><a href="contact.php"><i class="fas fa-address-book"></i>ContactInfo</a></li>
                    <li><a href="team.php"><i class="fas fa-user-friends"></i>Team</a></li>
                    <li><a href="changepassword.php"><i class="fas fa-user-lock"></i>Change Password</a></li>

                </ul>

            </div>

        </div>

        <div class="header">
            <h2>Our Customers</h2>
        </div>


        <div class="container">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="&#xF002; Search for customer . . . . ." title="Type in a name">
            <table id="table1" style="width:100%;">
                <tr class="firstrow">
                    <th>Id</th>
                    <th>
                        Customer Name
                    </th>

                    <th>
                        Address
                    </th>
                    <th>
                        Phone Number
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Action
                    </th>


                </tr>

                <?php


                // $_SESSION['']
                include('dbconnect.php');
                $query = mysqli_query($conn, "SELECT * FROM customer where isdelete=0");

                while ($row2 = mysqli_fetch_assoc($query)) {
                ?>
                    <tr class="secondrow">
                        <td>
                            <?php echo $row2['id'] ?>
                        </td>
                        <td>
                            <?php echo $row2['username'] ?>
                        </td>
                        <td>
                            <?php echo $row2['uaddress'] ?>
                        </td>
                        <td>
                            <?php echo $row2['uphone'] ?>
                        </td>
                        <td>
                            <?php echo $row2['email'] ?>
                        </td>
                        <td>                        
                        <a href="deleteuser.php?id=<?php echo $row2['id'] ?>" onclick="return checkDelete();"> <i class='fas fa-trash' style='font-size:25px;color:red'></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>





        </div>

        <script>
            function checkDelete() {
                return confirm("Do You Want to remove this registered customers?");
            }

            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("table1");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];

                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        }
                        // } 
                        else {
                            tds = tr[i].getElementsByTagName("td")[1];
                            txtValue2 = tds.textContent || tds.innerText;
                            if (txtValue2.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            }
                        else {
                            tr[i].style.display = "none";
                        }
                    }
                }


                }
            }
        </script>
    </body>



    </html>
<?php } else {
    header('Location:index.php');
} ?>