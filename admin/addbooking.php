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
        <link rel="stylesheet" href="../customcss/additem.css">
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
                    <li class="active"><a href="order.php"><i class="fas fa-shopping-cart"></i> Booking</a></li>
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


        </div>
        <div class="header">
            <h2>Add Booking</h2>
        </div>
        <div style="padding:1px 16px;height:1000px;">
            <div class="container">
                <form action="orderprocess.php" method="POST" enctype="multipart/form-data" id="addbooking">
                    <p id="error" style="color:red;"></p>
                    <div class="row">
                        <div class="col-25">
                            <label for="category">Customer Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="acname" name="cname" placeholder="Customer Name" required>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="category">Room Name</label>
                        </div>
                        <div class="col-75">
                            <select name="rname" id="rname">
                                <?php
                                include('dbconnect.php');
                                $query = mysqli_query($conn, "SELECT * FROM room where isdelete=0");
                                while ($row = mysqli_fetch_assoc($query)) {

                                ?>

                                    <option value="<?php echo $row['rname'] ?>"> <?php echo $row['rname']; ?></option>
                                <?php } ?>



                            </select>

                        </div>
                    </div>



                    <div class="row">
                        <div class="col-25">
                            <label for="desc">CheckIn Date</label>
                        </div>
                        <div class="col-75">

                            <input onchange="myFunctions()" type="date" id="fromDate" min="" name="fromDate" required><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="image">CheckOut Date</label>
                        </div>
                        <div class="col-75">
                            <input onclick="myFunction()" type="date" id="toDate" name="toDate" min="" required>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Status">Status</label>
                        </div>
                        <div class="col-75">
                            <select name="status" id="cars">
                                <option value="On Process">On Process</option>
                                <option value="Checked In">Checked In</option>
                                <option value="Checked Out">Checked Out</option>

                            </select>
                        </div>
                    </div>


                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <input type="submit" value="Add" name="submit">
            </div>
            </form>

        </div>
        <script>
            const oname = document.getElementById('acname');
            const form = document.getElementById('addbooking');
            const errorElement = document.getElementById('error');
            var regex = /^[a-zA-Z ]{2,30}$/;

            form.addEventListener('submit', (e) => {
                let messages = [];
                const a = regex.test(oname.value);


                if (!a) {
                    messages.push("Invalid Name!");
                }

                if (messages.length > 0) {
                    e.preventDefault()
                    errorElement.innerText = messages.join("\n")
                }
            })











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
    </body>

    </html>
<?php } else {
    header('Location:index.php');
} ?>