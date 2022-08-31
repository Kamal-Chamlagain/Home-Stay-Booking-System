<?php
session_start();
if (isset($_SESSION['valid'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include('dbconnect.php') ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <!-- <link rel="stylesheet" href="customcss/home.css"> -->
        <!-- <link rel="stylesheet" href="customcss/footer.css"> -->
        <link rel="stylesheet" href="order.css">
        <link rel="icon" href="img/main.ico">
        <title>Namuna Home Stay</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <style>
            #pbutton{
                background-color: green;
                margin-top:10px;
                background: coral;
               padding:10px;
               font-size: 15px;
               color:white;
               border-radius: 5px;
            }
            #myInput,
            #myDate {

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

            .add {
                /* float: right; */
                margin-right: 10px;
                border-radius: 5px;
                background: green;
            }

            .add:hover {
                background-color: green;
                /* background-color: green; */
            }
            #table_2{
                float:right;
                margin: 10px;
                padding:5px;
                background-color:green;
                color:white;
                border-radius: 5px;
            }
           
        </style>

<style id="table_style" type="text/css">
    /* body
    {
        font-family: Arial;
        font-size: 10pt;
    } */
    table
    {
        border: 1px solid #ccc;
        border-collapse: collapse;
    }
    table th
    {
        background-color: #F7F7F7;
        color: #333;
        font-weight: bold;
    }
    table th, table td
    {
        padding: 5px;
        border: 1px solid #ccc;
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
                    <li class="active"><a href="report.php"><i class="fas fa-file"></i>Reports</a></li>

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
            <h2>Date Wise Report</h2>
        </div>

        <div class="container" >
            <div id="dvContents">
            <form action="" method="GET">
                From Date:<input type="Date" id="myDate" name="fromDate" value="<?php if (isset($_GET['fromDate'])) {
                                                                            echo $_GET['fromDate'];
                                                                        } ?>" >
                To Date:<input type="Date" id="myDate" name="toDate" value="<?php if (isset($_GET['toDate'])) {
                                                                            echo $_GET['toDate'];
                                                                        } ?>" >
               <button type="submit" class="add">Generate</button>
            </form>




            <?php
            if (isset($_GET['fromDate']) && isset($_GET['toDate'])) {
                $fromDate = $_GET['fromDate'];
                $toDate = $_GET['toDate'];

                $query2 = mysqli_query($conn, "SELECT * FROM booking where rFrom BETWEEN '$fromDate' AND '$toDate' and  isdelete=0 order by rFrom asc");
                $amount = 0;
                $no =0;

                if(mysqli_num_rows($query2)>0){
            ?>
                <table style="width: 100%" id="table1">
                    <tr class="firstrow">
                        <th>
                            Booking ID
                        </th>
                        <th>
                            Booking Date
                        </th>
                        <th>
                            UserName
                        </th>
                        <th>
                            Room Name
                        </th>
                        <th>
                            Room Type
                        </th>
                        <th>
                            Rate
                        </th>
                        <th>
                            CheckIn Date
                        </th>
                        <th>
                            CheckOut Date
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Status
                        </th>


                    </tr>
                    <?php
                    $query2 = mysqli_query($conn, "SELECT * FROM booking where rFrom BETWEEN '$fromDate' AND '$toDate' and  isdelete=0 order by rFrom asc");
                    while ($row2 = mysqli_fetch_assoc($query2)) {
                        $amount = $amount + $row2['amount'] ;
                        $no++;
                    ?>

                        <tr class="secondrow">
                            <td>
                                <?php echo $row2['bookid']; ?>
                            </td>
                            <td>
                                <?php echo $row2['bookdate']; ?>
                            </td>
                            <td>
                                <?php echo $row2['uname']; ?>
                            </td>
                            <td>
                                <?php echo $row2['rname'] ?>
                            </td>
                            <td>
                                <?php echo $row2['cat_name'] ?>
                            </td>
                            <td>
                                <?php echo $row2['rate'] ?>
                            </td>
                            <td>
                                <?php echo $row2['rFrom'] ?>
                            </td>
                            <td>
                                <?php echo $row2['rTo'] ?>
                            </td>
                            <td>
                                <?php echo $row2['amount'] ?>
                            </td>
                            <td>
                                <?php echo $row2['status'] ?>
                            </td>




                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <table id="table_2">
                <tr>
                    <td>Total Booking:</td>
                    <td>
                        <span id="price"> <?php echo $no?></span>
                    </td>
                </tr>
                <tr>
                    <td>Total Revenue:</td>
                    <td>
                        <span id="price"> <?php echo $amount?></span>
                    </td>
                </tr>
               

               
            </table>
            </div>
            <input id="pbutton" type="button" onclick="PrintTable();" value="Print"/>
            <?php }
            
              else{
                echo " <script> 
                alert ('No record found')
                </script>";
            }
            }
           ?>

        </div>
    
            
<script type="text/javascript">
    function PrintTable() {
        var printWindow = window.open('', '', 'height=500,width=800');
        printWindow.document.write('<html><head><title>Report</title>');
 
        //Print the Table CSS.
        var table_style = document.getElementById("table_style").innerHTML;
        printWindow.document.write('<style type = "text/css">');
        printWindow.document.write(table_style);
        printWindow.document.write('</style>');
        printWindow.document.write('</head>');
 
        //Print the DIV contents i.e. the HTML Table.
        printWindow.document.write('<body>');
        var divContents = document.getElementById("dvContents").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');
 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }


        </script>
    </body>



    </html>
<?php } else {
    header('Location:index.php');
} ?>