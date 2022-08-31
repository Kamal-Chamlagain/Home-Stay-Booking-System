<?php
session_start();
if (isset($_SESSION['valid'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="cpassword.css">
        <link rel="icon" href="img/main.ico">

        <title>Namuna Home Stay</title>
        <style>
            #cfile {
                background-color: indigo;
                color: white;
                padding: 0.5rem;
                font-family: sans-serif;
                border-radius: 0.3rem;
                cursor: pointer;
                margin-top: 1rem;
            }

            #file-chosen {
                margin-left: 0.3rem;
                font-family: sans-serif;
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
                    <li><a href="users.php"><i class="fas fa-user"></i>Customers</a></li>
                    <li><a href="message.php"><i class="fas fa-comment-alt"></i>Messages</a></li>
                    <li class="active"><a href="slider.php"><i class="fas fa-images"></i>Gallery</a></li>
                    <li><a href="contact.php"><i class="fas fa-address-book"></i>ContactInfo</a></li>
                    <li><a href="team.php"><i class="fas fa-user-friends"></i>Team</a></li>
                    <li><a href="changepassword.php"><i class="fas fa-user-lock"></i>Change Password</a></li>



                </ul>

            </div>

        </div>

        <div class="header">
            <h2>Update Image</h2>
        </div>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

        ?>

            <div class="acontainer">
                <form action="suprocess.php" method="POST" enctype="multipart/form-data" id="achangepassword">

                    <div class="arow">
                        <div class="acol-25">
                            <label for="cp">Image</label>
                        </div>
                        <div class="acol-75">
                            <input type="file" id="actual-btn" name="simage" hidden required />

                            <!-- our custom upload button -->
                            <label id="cfile" for="actual-btn">Choose File</label>

                            <!-- name of file chosen -->
                            <span id="file-chosen">No file chosen</span>
                        </div>
                    </div>



                    <div class="arow">
                        <input type="submit" value="Change Image" name="submit">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </form>
            </div>


        <?php } ?>

        <script>
            const actualBtn = document.getElementById('actual-btn');

            const fileChosen = document.getElementById('file-chosen');

            actualBtn.addEventListener('change', function() {
                fileChosen.textContent = this.files[0].name
            })
        </script>


    </body>

    </html>
<?php } else {
    header('Location:index.php');
} ?>