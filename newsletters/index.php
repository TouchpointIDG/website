<?php
	$nvc_count = 24;
	$nsc_count = 41;
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
		<link href="/resources/css/styles.min.css" rel="stylesheet">
		<?php include('resources/page-elements/favicon.php'); ?>
	</head>



	<body>
		<div id="wrapper">
			<?php include("../resources/page-elements/navigation.php"); ?>


			<div id="content">

				<div class="para">

					<div class="tab">
            <button class="tablinks" onclick="openTab(event, 'NSC')" id="defaultOpen">Digital Updates</button>
            <button class="tablinks" onclick="openTab(event, 'NVC')">Behavior Dynamics</button>
          </div>

					<div id="NSC" class="tabcontent">
						<h3>
							Non-Standard Communications Digital Updates
						</h3>

						<ul class="newsletters">

							<?php for($vol = $nsc_count; $vol > 0; $vol--) : ?>

							<li>
								<a target="_blank" href="/newsletters/download.php?type=NSC&file=NSC_<?php echo $vol; ?>.pdf">
									NSC #<?php echo $vol; ?>
								</a>
							</li>

							<?php endfor; ?>

						</ul>
					</div>

					<div id="NVC" class="tabcontent">
						<h3>
							Non-Verbal Communications Digital Updates
						</h3>
						<ul class="newsletters">


							<?php for($vol = $nvc_count; $vol > 0; $vol--) : ?>

							<li>
								<a target="_blank" href="/newsletters/download.php?type=NVC&file=NVC_<?php echo $vol; ?>.pdf">
									NVC #<?php echo $vol; ?>
								</a>
							</li>

							<?php endfor; ?>
						</ul>
					</div>
				</div>

			</div>
				<?php include("../resources/page-elements/footer.php"); ?>

		</div>

		<script>
			function openTab(evt, tabName) {
				// Declare all variables
				var i, tabcontent, tablinks;

				// Get all elements with class="tabcontent" and hide them
				tabcontent = document.getElementsByClassName("tabcontent");

				for (i = 0; i < tabcontent.length; i++) {
						tabcontent[i].style.display = "none";
				}

				// Get all elements with class="tablinks" and remove the class "active"
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
						tablinks[i].className = tablinks[i].className.replace(" active", "");
				}

				// Show the current tab, and add an "active" class to the button that opened the tab
				document.getElementById(tabName).style.display = "block";
				evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
		</script>

		<script src="/resources/js/nav-scripts.min.js"></script>
		<?php include_once("../resources/page-elements/analytics.php"); ?>
	</body>
</html>
