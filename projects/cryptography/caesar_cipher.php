<?php
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") :
?>

<?php
	if(isset($_POST['plaintext']) && !is_null($_POST['plaintext']) && isset($_POST['key']))
	{
		$plaintext = $_POST['plaintext'];
		
		require 'crypto.class.php';
		
		$crypto = new crypto();
		
		if(isset($_POST['encode_decode']) && $_POST['encode_decode'] == "encode_decode")
		{
			$key = $_POST['key'];
			
			$ciphertext = $crypto->encodeCaesar($plaintext, $key);
		}
		else if(isset($_POST['brute_force']) && $_POST['brute_force'] == "brute_force")
		{
			$ciphertexts = $crypto->bruteForceCaesar($plaintext);
		}
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">


<head>
<title>Cryptography - Caesar</title>

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
		<h2 class="pagehead">Caesar Cipher</h2>           
		<div class="para2">
			<br>
			<a href="index.php" style="color:brown;a:hover:white;">&nbsp;<-- back to index</a>
				
			<p>
				The Caesar Cipher is a simple substitution cipher...
			</p>
			
			<form method="post" action="caesar_cipher.php" class="plaintext-form">
			
				<textarea rows="4" cols="5" class="plaintext-textarea" name="plaintext" required><?php if(!is_null($plaintext)){ echo $plaintext; } ?></textarea>
			
				<button class="plaintext-submit" type="submit" name="encode_decode" value="encode_decode">Encode/Decode</button>
				<select name="key">
					<?php for($i = 1; $i <= 26; $i++){ echo "<option value='$i'>$i</option>";} ?>
				</select>
				<button class="plaintext-submit" type="submit" name="brute_force" value="brute_force">Brute Force</button>
				
				<textarea rows="20" cols="5" class="plaintext-textarea" name="ciphertext"><?php if(!is_null($ciphertexts)){ $i = 1; foreach($ciphertexts as $c){ echo $i . ". " . $c . "\n"; $i++;} } else if(!is_null($ciphertext)){ echo $ciphertext; } ?></textarea>
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
