<!DOCTYPE html>
<html>
	<?php include("resources/head.php"); ?>
	
	<body>
		<?php include("resources/navigation.php"); ?>

		<div id="unavail" class="bigbox">
			<div class="bigbox-inner">
				<h2 class="pagehead"><?php echo $_GET['pagename']; ?> Unavailable</h2>
				
				<div class="para">
					<p style="font-size:2em;">
						The <?php echo $_GET['pagename']; ?> page is still under construction and should be available soon.
						<br><br>
						Please enjoy the rest of the site.
					</p>
				</div>
			</div>
		</div>

		<?php include("resources/footer.php"); ?>
	</body>
</html>
