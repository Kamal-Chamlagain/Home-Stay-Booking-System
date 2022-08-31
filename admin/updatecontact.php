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
        <link rel="stylesheet" href="contactinfo.css">
        <!-- <link rel="stylesheet" href="cp.css"> -->
        <link rel="icon" href="img/main.ico">

        <title>Namuna Home Stay</title>

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
                    <li><a href="message.php"><i class="fas fa-comment-alt"></i>Messages</a></li>
                    <li><a href="slider.php"><i class="fas fa-images"></i>Gallery</a></li>
                    <li class="active"><a href="contact.php"><i class="fas fa-address-book"></i>ContactInfo</a></li>
                    <li><a href="team.php"><i class="fas fa-user-friends"></i>Team</a></li>
                    <li><a href="changepassword.php"><i class="fas fa-user-lock"></i>Change Password</a></li>


                </ul>

            </div>

        </div>

        <div class="header">
            <h2> Update Contact Info</h2>
        </div>



        <div class="ccontainer">
            <form action="ucprocess.php" method="POST" enctype="multipart/form-data" id="updatecontact">

                <?php

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    include('dbconnect.php');
                    $query = mysqli_query($conn, "SELECT * FROM contactinfo WHERE id=$id");
                    while ($row2 = mysqli_fetch_assoc($query)) {


                ?>

                        <p id="cerror" style="color:red;"></p>
                        <div class="crow">
                            <div class="ccol-25">
                                <label for="name">Address</label>
                            </div>
                            <div class="ccol-75">
                                <input type="text"  value="<?php echo $row2['address'] ?>" name="address">
                            </div>
                        </div>


                        <div class="crow">
                            <div class="ccol-25">
                                <label for="email">Email</label>
                            </div>
                            <div class="ccol-75">
                                <input type="email" id="cuemail" value="<?php echo $row2['email'] ?>" name="email">
                            </div>
                        </div>


                        <div class="crow">
                            <div class="ccol-25">
                                <label for="cp">Phone Number</label>
                            </div>
                            <div class="ccol-75">
                                <input type="text" id="cuphone" value="<?php echo $row2['phone'] ?>" name="phone">
                            </div>
                        </div>

                        <div class="crow">

                            <input type="submit" value="Update" name="submit"></a>
                        </div>
                    <?php } ?>
                    <input type="hidden" name="id" value="<?php echo $id ?>">

                <?php } ?>
            </form>

        </div>



        <script>

const cuemail = document.getElementById('cuemail');
const cuphone = document.getElementById('cuphone');
const cform3 = document.getElementById('updatecontact');
const cerrorElement3 = document.getElementById('cerror');

var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
var re = /^[9][7-8][0-9]{8}$/;
cform3.addEventListener('submit', (e) => {
    let messages = [];
  
    const em = pattern.test(cuemail.value);
    const ph = re.test(cuphone.value);
   if (!em) {
        messages.push("Invalid Email!");
      
    }
    else if(!ph){
        messages.push("Invalid phone!");
       }
    
    if (messages.length > 0) {
        e.preventDefault();
        cerrorElement3.innerText = messages.join("\n");
    }
})
            </script>

    </body>



    </html>
<?php } else {
    header('Location:index.php');
} ?>