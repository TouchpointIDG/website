<?php
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") :

		//grabs variable from the sky
		$username = $_GET['username'];

		//check some things
		if(!empty($username)) :
			$twitter = "https://twitter.com/search?f=users&q=" . $username;
			$instagram = "https://www.google.com/#q=site:" . "instagram.com" . "+%22" . $username . "%22";
			$googleplus = "https://plus.google.com/s/" . $username . "/top";
			$youtube = "https://www.youtube.com/results?search_query=" . $username;
			$tumblr = "https://www.tumblr.com/search/" . $username;
?>


<!DOCTYPE html>
<html>


<head>
<title>TPIDG OSINT</title>

<!-- META TAGS-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Open Source Intelligence forms to find specific people.">
<meta name="author" content="Touchpoint International Development Group, Inc.">
<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, OSINT, Open, Source, Intelligence, Open Source Intelligence">

<!-- CSS -->
<link href="../../css/main_styles.css" rel="stylesheet">

</head>


<body>
<?php include("../../resources/navigation.php"); ?>



<header id="osint" class="bigbox">
	<div class="bigbox-inner">
		<h2 class="pagehead">OSINT LINKS</h2>           
		<div class="para2">
			<p class="parahead">This form is a work in progress and is continuously being updated.</p>
			<h4 class="parahead" style="margin-bottom: 5px;">Choose a Social Media Platform</h4>
			<div class="osint_form">
					
				<a href="<?php echo $twitter ?>" target="_blank"><img src='images/username/twitter.png' width='auto' height='auto' /></a>
				<a href="<?php echo $instagram ?>" target="_blank"><img src='images/username/instagram.png' width='auto' height='auto' /></a>
				<a href="<?php echo $googleplus ?>" target="_blank"><img src='images/username/googleplus.png' width='auto' height='auto' /></a>
				<a href="<?php echo $youtube ?>" target="_blank"><img src='images/username/youtube.png' width='auto' height='auto' /></a>
				<a href="<?php echo $tumblr ?>" target="_blank"><img src='images/username/tumblr.png' width='auto' height='auto' /></a>
				
			</div>
		</div>
	</div>
</header> 


<?php include("../../resources/footer.php"); ?>

<!-- Core JavaScript -->
<script src="/js/jquery-1.12.4.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/rollover.js"></script>
    

    
</body>
</html>
	<?php else : header('Location: index.php'); endif; ?>
		<?php else : header('Location: https://tpidg.us/login.php'); endif; ?>

