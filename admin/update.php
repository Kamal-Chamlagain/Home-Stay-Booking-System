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
    <!-- <link rel="stylesheet" href="customcss/home.css"> -->
    <link rel="stylesheet" href="../customcss/footer.css">
    <link rel="stylesheet" href="../customcss/additem.css">
    <link rel="icon" href="img/main.ico">
    <!-- <link rel="stylesheet" href="customcss/order.css"> -->
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
          <li class="active"><a href="adminroom.php"><i class="fas fa-bed"></i>Rooms</a></li>
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
      <h2>Update Rooms</h2>
    </div>
    <div style="padding:1px 16px;height:1000px;">
      <div class="container">
        <form action="updatecat.php" method="POST" enctype="multipart/form-data" id="updateroom">
      <p id="uerror" style="color:red;"></p>
          <?php
          if (isset($_GET['id'])) {
            $id = $_GET['id'];

            include('dbconnect.php');
            $query = mysqli_query($conn, "SELECT * FROM room WHERE id=$id and isdelete=0");
            while ($row = mysqli_fetch_assoc($query)) {

          ?>
              <div class="row">
                <div class="col-25">
                  <label for="category">Room Name</label>
                </div>
                <div class="col-75">
                  <input type="text" id="catg" name="rname" value="<?php echo $row['rname'] ?>" placeholder="Room Name" required>

                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="category">Room Type</label>
                </div>
                <div class="col-75">
                  <input type="text" id="ucatg" name="rtype" value="<?php echo $row['cat_name'] ?>" placeholder="Room Type" required>

                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="rRate">Rate</label>
                </div>
                <div class="col-75">
                  <input type="text" id="prate" name="rate" value="<?php echo $row['rate'] ?>" required>
                </div>
              </div>


              <div class="row">
                <div class="col-25">
                  <label for="desc">Description</label>
                </div>
                <div class="col-75">
                  <textarea id="pdesc" name="desc" style="height:200px" required><?php echo $row['description'] ?></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="image">Image</label>
                </div>
                <div class="acol-75">
                  <input type="file" id="actual-btn" name="image" hidden required />

                  <!-- our custom upload button -->
                  <label id="cfile" for="actual-btn">Choose File</label>

                  <!-- name of file chosen -->
                  <span id="file-chosen">No file chosen</span>
                </div>
              </div>
              <br>
            <?php } ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <input type="submit" value="Update" name="submit">
      </div>
      </form>
    <?php } ?>
    </div>
    </div>
    <script>

const adtype= document.getElementById('ucatg');
            const uform = document.getElementById('updateroom');
            const uerror = document.getElementById('uerror');
            var regex = /^[a-zA-Z ]{2,30}$/;

            uform.addEventListener('submit', (e) => {
                let messages = [];
                const a = regex.test(adtype.value);


                if (!a) {
                    messages.push("Invalid Room Type!");
                }

                if (messages.length > 0) {
                    e.preventDefault()
                   uerror.innerText = messages.join("\n")
                }
            })

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