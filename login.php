<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.css">
    <!-- <link rel="stylesheer" href="register.css"> -->
    <link rel="stylesheet" href="customcss/navbars.css">
    <!-- <link rel="stylesheet" href="customcss/footer.css"> -->
    <link rel="icon" href="images/main.ico">
    <title>Namuna Home Stay</title>

    <style>
        #fp:hover{
            color:red;
        }
    </style>
</head>

<body>
    <!-- Navbar Starts here -->
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
        session_start();
        if (!isset($_SESSION['userid'])) {
        ?>
            <a class="active"href="login.php">login</a>
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
       

    </header>


    <!-- Login Form -->
    <div class="bg-img">
        

        <div class="fcontainer">
            <div class="form-btn">
                <span onclick="login()">Login</span>
                <span onclick="register()">Register</span>
                <hr id="Indicator">
            </div>
            <form action="loginprocess.php" method="POST" enctype="multipart/form-data" id="LoginForm">
                
                <input type="Email" class="login" placeholder="Email" name="uemail" required>                
                <input type="password" class="login" placeholder="Password" name="upass" required>
                <button type="submit" class="btn">Login</button>
                <a href="fp.php" id="fp" >Forget Password?Click Here</a>
            </form>
            <form action="registerprocess.php" method="POST" enctype="multipart/form-data" id="RegForm">
                <p id="error" style="color:red;"></p>
                <input type="text" placeholder="Username" name="uname" id="rname" required>
                <input type="Email" placeholder="Email" name="uemail" id="remail" required>
                <input type="text" placeholder="Address" name="uaddress" id="raddress" required>
                <input type="text" placeholder="Phone Number" name="uphone" id="rphone" required>
                <input type="password" placeholder="Password" name="upass" id="rpass" required>
                <input type="password" placeholder=" Confirm Password" name="ucpass" id="rcpass" required>
              
                <!-- <input type="password" placeholder="Re-enter password"> -->
                <button type="submit" class="btn">Register</button>

            </form>
        </div>


    </div>
    <?php include("footers.php")?>
</body>


<!-- Script for responsive Navbar -->
<script derfer src="script.js"></script>
<script>
    
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");
    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)"
    }

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }
    login();

    
</script>

</html>