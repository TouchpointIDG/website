<?php
	include_once 'logs.php';
	include_once 'mail/contact.class.php';
	
	$IP = $_SERVER['REMOTE_ADDR'];
	$PORT = $_SERVER['SERVER_PORT'];
	$SERVER = $_SERVER['SERVER_ADDR'];
	
	$logger = new logs();
	$logger->addIPLog($IP);
	
	$userAgent = $logger->collectInfo();	
	
?>

<!DOCTYPE html>
<html lang="en">


	<head>
		<title>TPIDG Home</title>

		<!-- META TAGS-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Touchpoint International Development Group (Touchpoint IDG) is a security-cleared Service Disabled Veteran Owned Small Business (SDVOSB) that conducts specialized training and security services to Special Operations Forces (SOF) and the Intelligence Community (IC).">
		<meta name="author" content="Touchpoint International Development Group, Inc.">
		<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, index, home">
		<meta name="google-site-verification" content="Yk6JHgiAcHxpIWzoNJyf6ErhFOtzgx-CuMcJsXHKffo" />

		<!-- CSS -->
		<link href="/css/main_styles.css" rel="stylesheet">

	</head>


	<body>
		<?php include("resources/navigation.php"); ?>
		<?php include("resources/carousel.php"); ?>

		<h1 class="helpheader">
			Touchpoint: the interface of a service before, during and after a transaction.
		</h1>

		<?php include("resources/help_button.php") ?>

		<?php include("resources/portfolio.php"); ?>

		<h1 style="visibility:hidden;">
			Touchpoint International Development Group, INC
		</h1>

		<?php include("resources/footer.php"); ?>

		<?php include_once("resources/analytics.php") ?>

		<!-- Core JavaScript -->
		<script src="/js/jquery-1.12.4.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/rollover.js"></script>

		<!-- Makes the carousel work -->
		<script type="text/javascript">
			$('.carousel').carousel({
			interval: 10000 //changes the speed
			})
		</script>
		
		<script type="text/javascript">
			imagerollover()
		</script>

	</body>
</html>
