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
		
		require_once 'includes/database.class.php';
		
		$db = new database();
		$conn = $db->connect();

		$stmt = $conn->prepare('SELECT * FROM NAME_SEARCH');
		
		//executes the statement
		$stmt->execute();
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
<p class="parahead">People Engines</p>
    <h4 class="parahead" style="margin-bottom: 5px;">Choose a Search Engine</h4>
		<div class="osint_form">
			<?php
				
				$id = 1;
				$javascript = "";
				
				while($row = $stmt->fetch())
				{
					$URL = $row['URL'];
					$IMG_LOCATION = $row['IMG_LOCATION'];
					$pattern = '$';
					$formid = "form" . $id;
					
					//splits the URL into two parts
					//the first part contains the $ that is replaced with the firstname
					//the second part is for the last name
					$URL1 = substr($URL, 0, strpos($URL, '$') + 1);
					$URL1 = str_replace($pattern, $first_name, $URL1);
					$URL2 = substr($URL, strpos($URL, '$') + 1);
					$URL2 = str_replace($pattern, $last_name, $URL2);
					
					//adds the two parts of the URL back together
					$URL = $URL1 . $URL2;
					
					$javascript .= "window.open('" . $URL . "');";
										
					echo "<a href='#' onclick=window.open('$URL') ><img style='width:15%;' src='$IMG_LOCATION' /></a>";
				
					$id++;
				}
								
			?>

			<button style="display:block;width:300px;height:50px;margin:auto;text-align:center;" onclick="<?php echo $javascript ?>">Submit All (Requires Javascript and Pop-ups)</button>
			
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

