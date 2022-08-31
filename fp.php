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
        #bp:hover{
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
        <!-- <div class="icons">
    
            <a href="mycart.php" ><i class="fas fa-shopping-cart"></i></a>
            <a href="mybooking.php" ><i class="fas fa-user"></i></a>
            <a href="logout.php" style="font-size:20px;"><i class="fas fa-sign-out-alt"></i></a>
           
        </div> -->

    </header>


    <!-- Login Form -->
    <div class="bg-img">
        

        <div class="cfcontainer">
            <div class="form-btn">
            
               <h3 style="color:green; margin-bottom:10px;">Reset Password</h3>
                <!-- <hr id="Indicator"> -->
            </div>
           
            <form action="cpprocess.php" method="POST" enctype="multipart/form-data" id="ChangePasswordForm">
                <p id="cperror" style="color:red;"></p>
             
                <input type="Email" placeholder="Email" name="uemail" id="cremail" required>
               
                <input type="text" placeholder="Phone Number" name="uphone" id="crphone" required>
                <input type="password" placeholder=" New Password" name="upass" id="crpass" required>
                <input type="password" placeholder=" Confirm Password" name="ucpass" id="crcpass" required>
              
                <!-- <input type="password" placeholder="Re-enter password"> -->
                <button type="submit" class="btn">Change</button>
                <a href="login.php" id="bp">Back to login</a>

            </form>
        </div>


    </div>

<script>

const crpass = document.getElementById('crpass');
const crcpass = document.getElementById('crcpass');
const cremail = document.getElementById('cremail');
const crphone = document.getElementById('crphone');
const cform = document.getElementById('ChangePasswordForm');
const cperrorElement = document.getElementById('cperror');

var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
var re = /^[9][7-8][0-9]{8}$/;
cform.addEventListener('submit', (e) => {
    let messages = [];
    
    const cem = pattern.test(cremail.value);
    const cph = re.test(crphone.value);
  if (!cem) {
        messages.push("Invalid Email!");
      
    }
    else if(!cph){
        messages.push("Invalid phone!");
       }
    else if (crpass.value.length <= 6) {
        messages.push("password must be longer than 6 character!");
    }
    else if (crpass.value!= crcpass.value) {
        messages.push("Both password doesnot match !");
    }

    if (messages.length > 0) {
        e.preventDefault()
        cperrorElement.innerText = messages.join("\n")
    }
})





</script>



    <?php include("footers.php")?>
</body>

</html>