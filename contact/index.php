<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contact Us | Touchpoint IDG | TPIDG.US</title>

		<!-- META TAGS-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="For details concerning training, employment or contracts concerning Touchpoint IDG INC, use this contact form.">
		<meta name="author" content="Touchpoint International Development Group, Inc.">
		<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, contact">

		<!-- CSS -->
		<link href="/resources/css/styles.min.css" rel="stylesheet">
		<?php include('resources/page-elements/favicon.php'); ?>
	</head>
	<body>
		<div id="wrapper">
			<?php include("../resources/page-elements/navigation.php"); ?>
			<div id="content">

				<div class="para">
					<form id="contactform" name="contact_us" id="email" method="post" action="includes/contact_email.php" autocomplete="on"  onsubmit="return valid_form( this )">

							<h4 class="parahead">For operational or training assistance please select high priority and for employment or contract assistance select medium or low.  All messages sent from this page are automatically PGP encrypted. You can also call us at (910) 920-0350.</h4>

								<input type="text" placeholder="Name" name="name" required>

								<input type="email" placeholder="Email" name="email" required>

								<input type="text" placeholder="Phone" name="phone" required>

							<div id="contacttextarea">
								<textarea rows="4" placeholder="Your message here.." name="message" required></textarea><br>
							</div>

							<div id="contact_options">Priority:<br>
								<select required name="priority">
									<option value="Low">-- Low --</option>
									<option value="Medium">-- Medium --</option>
									<option value="High">-- High --</option>
								</select>

								<!--
								<input type="file" name="pubKey">
								-->
							</div>

							<center id="contactsubmit">
								<button type="submit" value="Send">Send</button>
							</center>
					</form>
				</div>
				<button class="para-button" onclick="window.open('https://www.tpidg.us/pgp/public/info@tpidg.us.asc')">info@tpidg.us Public PGP Key</button>
			</div>
			<?php include("../resources/page-elements/footer.php"); ?>
		</div>
		<script src="/resources/js/nav-scripts.min.js"></script>
	</body>
</html>
