<?php
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") :
?>

<!DOCTYPE html>
<html lang="en">


<head>
<title>Cryptography Projects</title>

<!-- META TAGS-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Touchpoint International Development Group, Inc.">
<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, OSINT, Open, Source, Intelligence, Open Source Intelligence">

<!-- CSS -->
<link href="../../css/main_styles.css" rel="stylesheet">

</head>

<body>
<?php include("../../resources/navigation.php"); ?>



<div id="crypto" class="bigbox">
	<div class="bigbox-inner">
		<h2 class="pagehead">Cryptography Examples</h2>           
		<div class="para2">
			<p class="parahead">Some examples of cryptography and how they work. More will be added as I have time to do so.</p>
				
				<ul>
					<li>Substitution Ciphers</li>
					
					<div class="project-block">
						<a href="caesar_cipher.php" class="project-buttons"><button>Caesar Cipher</button></a>
						<a href="rot13.php" class="project-buttons"><button>ROT13</button></a>
					</div>
					
				</ul>
		</div>
	</div>
</div>


<?php include("../../resources/footer.php"); ?>


<!-- Core JavaScript -->
<script src="/js/jquery-1.12.4.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/rollover.js"></script>

    
</body>
</html>

	<?php else : header('Location: https://tpidg.us/login.php?sendtopage=projects/cryptography'); endif; ?>
