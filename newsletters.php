<?php
	$nvc_count = 7;
	$nsc_count = 24;
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Digital Updates | Touchpoint IDG | TPIDG.US</title>

		<!-- META TAGS-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Twice a month, Touchpoint IDG, INC sends out a digital update concerning tech news, ways to protect your online presence and reviews of new hardware.">
		<meta name="author" content="Touchpoint International Development Group, Inc.">
		<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, digital updates, newsletters">
		<meta name="google-site-verification" content="Yk6JHgiAcHxpIWzoNJyf6ErhFOtzgx-CuMcJsXHKffo" />

		<!-- CSS -->
		<link href="/css/main_styles.new.css" rel="stylesheet">

	</head>



	<body>
		<div id="wrapper">
			<?php include("resources/navigation.new.php"); ?>


			<div id="content">

<!-- LEFT COLUMN -->
				<div class="para col3">

					<h3>
						Non-Standard Communications Digital Updates
					</h3>
					<ul class="newsletters">

<?php for($vol = $nsc_count; $vol > 0; $vol--) : ?>

						<li>
							<a target="_blank" href="/newsletters/downloads/NSC/NSC_<?php echo $vol; ?>.pdf">
								NSC #<?php echo $vol; ?>
							</a>
						</li>

<?php endfor; ?>

					</ul>
				</div>

<!-- MIDDLE COLUMN -->
				<div class="para col3">

					<form method="post" action="newsletters/subscribe.php">
						<input type="text" name="email" placeholder="Email Address..." maxlength="150" required>
						<input type="submit" name="submit" Value="Subscribe">
					</form>

					<!--a href="newsletters/downloads/digests.txt">
						File Digests
					</a-->

				</div>

<!-- RIGHT COLUMN -->
				<div class="para col3">

					<h3>
						Non-Verbal Communications Digital Updates
					</h3>
					<ul class="newsletters">


<?php for($vol = $nvc_count; $vol > 0; $vol--) : ?>

						<li>
							<a target="_blank" href="/newsletters/downloads/NVC/NVC_<?php echo $vol; ?>.pdf">
								NVC #<?php echo $vol; ?>
							</a>
						</li>

<?php endfor; ?>

					</ul>
				</div>


			</div>
				<?php include("resources/footer.new.php"); ?>

		</div>

		<?php include_once("resources/footer_scripts.php") ?>

		<?php include_once("resources/analytics.php"); ?>

	</body>
</html>
