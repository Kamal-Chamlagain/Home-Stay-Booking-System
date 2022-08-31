<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="customcss/footers.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Document</title>
</head>

<body>
	<!-- <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> -->
	<footer class="footer-distributed">

		<div class="footer-left">

			<h3>Namuna<span>HomeStay</span></h3>

			<p class="footer-links">
				<a href="index.php" class="link-1">Home</a>

				<a href="aboutus.php">About</a>

				<a href="rooms.php">Rooms</a>

				<a href="contact.php">Contact</a>


			</p>

			<p class="footer-company-name">Namuna Home Stay © 2077</p>
		</div>

		<div class="footer-center">
			<?php

			include('dbconnect.php');


			$query = mysqli_query($conn, "SELECT * FROM contactinfo");
			while ($row = mysqli_fetch_assoc($query)) {

			?>

				<div>
				<a href="https://www.google.com.np/maps/place/Namuna+kheti/@26.5766708,87.6908211,326m/data=!3m1!1e3!4m12!1m6!3m5!1s0x39e585589f19b3fd:0x78bf7e0126dbbd07!2sNamuna+kheti!8m2!3d26.5773272!4d87.6912574!3m4!1s0x39e585589f19b3fd:0x78bf7e0126dbbd07!8m2!3d26.5773272!4d87.6912574?hl=en&authuser=0"><i class="fa fa-map-marker"></i></a>
					<p><?php echo $row['address']?></p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p><?php echo $row['phone']?></p>
				</div>
			<?php } ?>

			<!-- <div>
				<i class="fa fa-facebook-square"></i>
					<p><a href="">Namuna Home Stay</a></p>
				</div> -->

		</div>

		<!-- 
			<div class="footer-right">

				<p class="footer-company-about">
					<span>About Namuna Home Stay </span>
					Namuna Home Stay is the model community home stay established inside the community farm of Nepal. It is agro tourism home stay of Nepal. It was established in 2077 B.S. to promote the farm-based tourism or agro tourism. It is located at gauradha-05,Jhapa,Nepal.
				</p>

				

			</div> -->

	</footer>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</body>

</html>