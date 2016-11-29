<!DOCTYPE html>
<html>


	<head>
		<title>Contact TPIDG</title>

		<!-- META TAGS-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="For details concerning training, employment or contracts concerning Touchpoint IDG INC, use this contact form.">
		<meta name="author" content="Touchpoint International Development Group, Inc.">
		<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, contact">
		<meta name="google-site-verification" content="Yk6JHgiAcHxpIWzoNJyf6ErhFOtzgx-CuMcJsXHKffo" />

		<!-- CSS -->
		<link href="/css/main_styles.css" rel="stylesheet">
	</head>



	<body>
		<?php include("resources/navigation.php"); ?>

		<div class="bigbox">
			<div class="bigbox-inner">
				<h2 class="pagehead">Contact Us</h2>
				
				<form id="contactform" name="contact_us" id="email" method="post" action="mail/contact_email.php" autocomplete="on"  onsubmit="return valid_form( this )">
					<div class="para">
						
						<h4 class="parahead">For details concerning training, employment or contracts, use this contact form.<br>For more immediate matters, call our office at <i>(910) 322-8805</i></h4>    
						
						<center id="contactuserinfo">
							<input type="text" placeholder="Name" name="name" required>

							<input type="email" placeholder="Email" name="email" required>

							<input type="text" placeholder="Phone" name="phone" required>
						</center>
						
						<div id="contacttextarea">
							<textarea rows="4" placeholder="Your message here.." name="message" required></textarea><br>
						</div>

						<div id="contact_options">Priority:<br>
							<select required name="priority">
								<option value="Low">-- Low --</option>
								<option value="Medium">-- Medium --</option>
								<option value="High">-- High --</option>
							</select>
							<p style="color:red;text-shadow:0px 0px black, 0px 0px black, 0px 0px black, 0px 0px black;">All information submitted through this form is encrypted end-to-end using PGP.</p>
							<!--
							<input type="file" name="pubKey">
							-->
						</div>
						
						<center id="contactsubmit">
							<button type="submit" value="Send">Send</button>
						</center>
					</div>
				</form>
			</div>
		</div>

		<?php include("resources/footer.php"); ?>

		<!-- Core JavaScript -->
		<script src="/js/jquery-1.12.4.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/rollover.js"></script>

		<?php include_once("resources/analytics.php") ?>

	</body>
</html>
