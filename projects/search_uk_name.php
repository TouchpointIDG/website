<?php

	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") :

	//grabs variables from the sky
	$name = $_GET['name'];

	//splits up the name into first and last
	$first_name = substr($name, 0, stripos($name, ' '));
	$last_name = substr($name, stripos($name, ' ') +1);

	//check some things
	if(!empty($first_name) && !empty($last_name)) :
		$pipl = "https://pipl.com/search/?q=" . $first_name . "+" . $last_name . "&l=United+Kingdom&sloc=&in=5";
		$radaris = "http://radaris.co.uk/p/" . $first_name . "/" . $last_name;
		$thephonebook = "http://www.thephonebook.bt.com/publisha.content/en/search/residential/search.publisha?Surname=" . $last_name . "&Location=Hereford&Initial=&Street=";
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
			<p class="parahead">We are in the process of finding more search engines to use in the UK.</p>
			<h4 class="parahead" style="margin-bottom: 5px;">Choose a Search Engine</h4>
			<div class="osint_form">
				<?php
					$osint_links = array($pipl, $radaris, $thephonebook);
					$osint_names = array("Pipl", "Radaris", "The Phone Book");
					$osint_images = array("pipl.png", "radaris.jpeg", "thephonebook.gif");
					
					$i = 0;
					while($i < 3)
					{
						echo "<a href='$osint_links[$i]' target='_blank'><img src='images/name/$osint_images[$i]' width='auto' height='auto' /></a>";
						$i++;
					}
					
				?>
				
				<form action="http://www.192.com/people/search/" method="post" target="_blank">
					<input name="looking_for" type="hidden" value="<?php echo $first_name . " " . $last_name ?>">
						
					<input style="width:auto;" name="submitBtn" type="image" src="images/name/192.jpg" width='auto' height='auto'>
												
				</form>
				
				<p class="parahead">Additional Manual Entry Links</p>
				<a target="_blank" href="http://www.192.com/">192</a> -- 
				<a target="_blank" href="http://search.whitepages.co.uk/">Whitepages</a> -- 
				<a target="_blank" href="http://www.searchelectoralroll.co.uk/">Search Electoral Roll</a> -- 
				<a target="_blank" href="http://www.infobel.com/">Infobel</a> -- 
				<a target="_blank" href="http://www.genesreunited.co.uk">Genes Reunited</a> -- 
				<a target="_blank" href="http://www.freeads.co.uk/">Free Ads</a> -- 
				<a target="_blank" href="http://mit-proxy.mapd.com/tweetmap/">Tweet Map</a> -- 
				<a target="_blank" href="http://www.britishphonebook.com">British Phone Book</a>
				
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

