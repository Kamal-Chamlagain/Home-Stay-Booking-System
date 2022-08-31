<?php   if ($_POST || $_GET) {?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customcss/productdetail.css">
    <link rel="stylesheet" href="customcss/navbars.css">
    <link rel="icon" href="images/main.ico">

    <title>Namuna Home Stay</title>
</head>

<body>
    <?php include('dbconnect.php');


    ?>
    <!-- Verical Navigation -->
    <!-- Navbar Starts here -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">Namuna Home Stay</a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="aboutus.php">about</a>
            <a class="active" href="rooms.php">rooms</a>
            <a href="contact.php">contact</a>
            <?php
        session_start();
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

    <!-- Product Details -->
    <div class="pcontainer">

        <?php
        if ($_POST || $_GET) {
            $pid;
            if ($_POST) {
                $pid = $_POST['rid'];
            } else if ($_GET) {
                $pid = $_GET['id'];
            }


            include('dbconnect.php');
            $query = mysqli_query($conn, "SELECT * FROM room WHERE id=$pid and isdelete=0");
            while ($row = mysqli_fetch_assoc($query)) {


        ?>

               
                    <div class="prow">
                        <div class="pcol-1">

                            <img src="images/<?php echo $row['image'] ?>" alt="maizeseeds" id="ProductImg">

                        </div>

                        <div class="pcol-2">
                            <form method="POST" action="cartprocess.php" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <input type="hidden" name="rname" value="<?php echo $row['rname'] ?>">
                                <input type="hidden" name="pname" value="<?php echo $row['cat_name'] ?>">
                                <input type="hidden" name="prate" value="<?php echo $row['rate'] ?>">
                                <input type="hidden" name="pdesc" value="<?php echo $row['description'] ?>">
                                <h1><?php echo $row['rname'] ?></h1>
                                <h3><?php echo $row['cat_name'] ?></h3>
                                <h4>Rs.<?php echo $row['rate'] ?> Per Night</h4>

                                <label for="date" class="cdate">CheckIn Date:</label>
                                <input onchange="myFunctions()" type="date" id="fromDate" min="" name="fromDate" required><br>
                                <label for="date" class="cdate">Checkout Date:</label>
                                <input onclick="myFunction()" type="date" id="toDate" name="toDate" min="" required>

                                <h3>About Room</h3>
                                <p>
                                    Desc:
                                <p><?php echo $row['description'] ?></p><br>
                                </p>
                                <button type="submit" value="submit" name="submit">Add to cart</button>
                                <button type="submit" value="check" name="check" class="cav">Check Availability</button>
                            </form>




                        </div>
                    </div>
                



        <?php }
        } ?>

    </div>

    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }


        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("fromDate").setAttribute("min", today);

        function myFunctions() {
            var tod = document.getElementById("toDate").value;


            if (tod != "") {
                document.getElementById("toDate").value = "";

                //     var to=document.getElementById("toDate").value;
                console.log(tod);
                //    if(to="") {
                //      document.getElementById("fromDate").setAttribute("min", today);
                //     }
                //    else{
                //         document.getElementById("toDate").innerHTML=0;
                //     }
            }
        }

        //document.getElementById("partys").setAttribute("min", today);

        function myFunction() {
            var to = document.getElementById("fromDate").value;

            if (to == "") {
                document.getElementById("toDate").setAttribute("min", today);
            } else {
                var tos = new Date(to);
                var dds = tos.getDate() + 1;
                var mms = tos.getMonth() + 1;
                var yyyys = tos.getFullYear();


                var ds = tos.getDate();
                var d = new Date(yyyys, mms, 0);
                var dde = d.getDate();


                if (ds == dde) {
                    mms = mms + 1;
                    var ddes = new Date(yyyys, mms, 1);
                    dds = ddes.getDate();

                }
                if (dds < 10) {
                    dds = '0' + dds
                }
                if (mms < 10) {
                    mms = '0' + mms
                }



                tos = yyyys + '-' + mms + '-' + dds;

                document.getElementById("toDate").setAttribute("min", tos);
            }

        }
    </script>






    <?php include("footers.php") ?>

</body>



</html>
<?php }
else
header('Location:rooms.php');
 ?>