<?php
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") :
?>

<?php
	if(isset($_POST['encode_decode']) && $_POST['encode_decode'] == "convert" && isset($_POST['plaintext']) && !is_null($_POST['plaintext']))
	{
		$plaintext = $_POST['plaintext'];
		
		require 'crypto.class.php';
		
		$crypto = new crypto();
		
		$key = 13;
		
		$ciphertext = $crypto->encodeCaesar($plaintext, $key);
	}
	
?>

<!DOCTYPE html>
<html lang="en">


<head>
<title>Cryptography - ROT13</title>

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
		<h2 class="pagehead">ROT13</h2>           
		<div class="para2">
			<br>
			<a href="index.php" style="color:brown;a:hover:white;">&nbsp;<-- back to index</a>
				
			<p>
				ROT13 is a specific variant of the Caesar Cipher using 13 as the number of shifts.
				 This is useful mainly because of the ease of encoding/decoding. Since 13 is half
				 of the 26 available characters, everything is simply inversed. This allows encoding/decoding 
				 without changing any settings.
			</p>
			
			<form method="post" action="rot13.php" class="plaintext-form">
			
				<textarea rows="4" cols="5" class="plaintext-textarea" name="plaintext" required></textarea>
			
				<button class="plaintext-submit" type="submit" name="encode_decode" value="convert">Encode/Decode</button>
				
				<textarea rows="4" cols="5" class="plaintext-textarea" name="ciphertext"><?php if(!is_null($ciphertext)): ?><?php echo $ciphertext ?><?php endif; ?></textarea>
			</form>
			
			
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
