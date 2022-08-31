<?php session_start();
if($_SESSION['userid'])
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="customcss/navbars.css">
    <link rel="stylesheet" href="customcss/cart.css">
    <link rel="icon" href="images/main.ico">

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
            $query = mysqli_query($conn, "SELECT * FROM cart WHERE uid=$pid and isdelete=0");
            $no=0;
            $no = mysqli_num_rows($query);

          
        ?>
            <div class="icons">

                <a class="active" href="mycart.php"><i class="fas fa-shopping-cart"><sup><?php echo $no?></sup></i></a>
                <a href="mybooking.php"><i class="fas fa-user"></i></a>
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


    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <center><h2>Rooms In Cart</h2></center>
                
            </div>

            <table id="table1">
                <thead>
                    <tr>
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
                        <th>CheckOut Date</th>
                        <td>
                            Total
                        </td>
                        <td>
                            Select
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
                    $query = mysqli_query($conn, "SELECT * FROM cart WHERE uid=$pid and isdelete=0");

                    // $no = mysqli_num_rows($query);

                    $i = 1;

                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td>

                                <?php echo $row['rname']; ?>
                            </td>
                            <td>

                                <?php echo $row['cat_name']; ?>
                            </td>

                            <td>
                                <?php echo $row['rate'] ?>
                            </td>
                            <td>
                                <?php echo $row['rFrom'] ?>
                            </td>
                            <td>
                                <?php echo $row['rTo'] ?>
                            </td>
                            <td>
                                <?php echo $row['amount'] ?>
                            </td>


                            <td>
                                <input type="checkbox" onchange='handleChange();' style="width:15px;">
                            </td>
                            <td>
                               
                                <a href="Edit.php?id=<?php echo $row['id'] ?>"><i class='fas fa-edit' style='font-size:25px;color:blue'></i></a>
                                <a href="Remove.php?id=<?php echo $row['id'] ?>" onclick="return checkDelete();"><i class='fas fa-trash' style='font-size:25px;color:red'></i></a>
                            </td>
                        </tr>



                    <?php

                    } ?>

                </tbody>
            </table>
        </div>
        </div>

        <!-- <input type="button" value="Get Selected" onclick="GetSelected()"> -->
        <div class="total-price">
            <table id="table 2">
                <tr>
                    <td>Grand Total</td>
                    <td>
                        <span id="price"></span>
                    </td>
                </tr>

                <tr>

                    <td><button type="submit" onclick="order();" class="checkbtn">Book Now</button></td>

                </tr>
            </table>

        </div>
    
    <!-- <form action="submit.php" method="GET" enctype="multipart/form-data" id="cartform"> -->
    <!-- <input type="hidden" id="names" name="name[]"value="">
       <input type="hidden" id="nos" name="no[]"value="">
       <input type="hidden" id="rates" name="rate[]"value="">
       <input type="hidden" id="tos" name="to[]"value="">
       <input type="hidden" id="froms" name="from[]"value="">
       <input type="hidden" id="amounts" name="amount[]"value="">
       <input type="hidden" name="id[]" value="1">
       <input type="hidden" name="id[]" value="2">
       <input type="hidden" name="id[]" value="3">
       <input type="hidden" name="id[]" value="4"> -->


    <!-- </form> -->
    </div>

    <script>

        function checkDelete() {
            return confirm('Do You want to remove this room from cart?');
        }

        var rnames = [];
        var rates = [];
        var total = 0;
        var cnames = [];
        var fromdates = [];
        var todates = [];
        var amounts = [];
        // function GetSelected() {
        function handleChange(checkbox) {
            // if (checkbox.checked == true) {
            var grid = document.getElementById("Table1");

            //Reference the CheckBoxes in Table.
            var checkBoxes = document.getElementsByTagName("INPUT");



            var message = 0;
            var rname = [];
            var rate = [];
            var cname = [];
            var fromdate = [];
            var todate = [];
            var amount = [];
            var j = 0;
            //var rate = "0";
            //Loop through the CheckBoxes.
            for (var i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    var row = checkBoxes[i].parentNode.parentNode;

                    message += parseFloat(row.cells[5].innerHTML.trim());
                    // var rate = row.cells[5].querySelector('input').value.trim()
                    //console.log(rate);
                    //var rate = row.cells[3].querySelector('input').value.trim();

                    rname[j] = row.cells[0].innerHTML.trim();
                    cname[j] = row.cells[1].innerHTML.trim();
                    rate[j] = row.cells[2].innerHTML.trim();
                    // number[j] = row.cells[1].querySelector('input[name="pty"]').value.trim();
                    fromdate[j] = row.cells[3].innerHTML.trim();
                    todate[j] = row.cells[4].innerHTML.trim();
                    amount[j] = row.cells[5].innerHTML.trim();
                    j++;

                }
            }


            document.getElementById("price").innerHTML = "Rs." + message;


            // document.getElementById("demo").innerHTML = name;
            // document.getElementById("demos").innerHTML = rate;
            // document.getElementById("demoss").innerHTML = number;
            // document.getElementById("demosss").innerHTML = fromdate;
            // document.getElementById("demossss").innerHTML = todate;


            // document.getElementById("names").value = name;
            // document.getElementById("nos").value = number;
            // document.getElementById("rates").value = rate;
            // document.getElementById("tos").value = todate;
            // document.getElementById("froms").value = fromdate;
            // document.getElementById("amounts").value = amount;
            // document.getElementById("names").value = name;

            rnames = rname.slice();
            rates = rate.slice();
            cnames = cname.slice();
            // numbers = number.slice();
            fromdates = fromdate.slice();
            todates = todate.slice();
            amounts = amount.slice();
            total = message;

        }

  function order() {
    

            if (rnames == "") {
               window.alert("choose any one");
               window.location.href = 'mycart.php';
              
            } 
              
            else{var eror = 0;

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
                for (var k = 0; k < fromdates.length; k++) {
                    if (fromdates[k] < today) {
                        eror = 1;
                    }
                }

                if (eror == 1) {
                    window.alert("Check In date must be greater than or equal to today");
                } else {
                    var src = "submit.php?rname=" + rnames + "&cname=" + cnames + "&rate=" + rates + "&fromdate=" + fromdates + "&todate=" + todates + "&amount=" + amounts;
                    window.location.href = src;
                }
            }
            //  else {
               
            //     var src = "submit.php?rname=" + rnames + "&cname=" + cnames + "&rate=" + rates + "&fromdate=" + fromdates + "&todate=" + todates + "&amount=" + amounts;
            //    window.location.href = src;
            // }



        }

      



        //  handleChange(this);



        // function cartUpdate(){
        //     document.getElementById("amount").innerHTML="4000";

        // }
    </script>


    <?php include('footers.php') ?>

</body>

</html>
<?php }
else
header('Location:login.php');
 ?>
