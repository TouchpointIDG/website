<?php
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") :
?>

<!DOCTYPE html>
<html>


<head>
<title>TPIDG Home</title>

<!-- META TAGS-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Open Source Intelligence forms to find specific people.">
<meta name="author" content="Touchpoint International Development Group, Inc.">
<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, OSINT, Open, Source, Intelligence, Open Source Intelligence">

<!-- CSS -->
<link href="/css/main_styles.css" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<style type="text/css">

.boxie {
    margin: 10px auto;
    width: 300px;
    height: 50px;
}

.container-1 {
    width: 300px;
    vertical-align: middle;
    white-space: nowrap;
    position: relative;
}

.container-1 .icon {
    position: absolute;
    margin-left: 17px;
    margin-top: 10px;
    z-index: 1;
    color: #4f5b66;
}

.fa {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.fa-search:before {
    content: "\f002";
}

.container-1 input#search{
  width: 300px;
  height: 50px;
  background: #2b303b;
  border: none;
  font-size: 10pt;
  color: #262626;
  padding-left: 45px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
 
   
    -webkit-transition: background .55s ease;
  -moz-transition: background .55s ease;
  -ms-transition: background .55s ease;
  -o-transition: background .55s ease;
  transition: background .55s ease;
}

.container-1 input#search::-webkit-input-placeholder {
   color: #65737e;
}
 
.container-1 input#search:-moz-placeholder { /* Firefox 18- */
   color: #65737e;  
}
 
.container-1 input#search::-moz-placeholder {  /* Firefox 19+ */
   color: #65737e;  
}
 
.container-1 input#search:-ms-input-placeholder {  
   color: #65737e;  
   
}

.container-1 input#search:hover, .container-1 input#search:focus, .container-1 input#search:active{
    outline:none;
    background: #ffffff;
}


</style>


</head>


<body>
<?php include("../../resources/navigation.php"); ?>



<header id="osint" class="bigbox">
	<div class="bigbox-inner">
		<h2 class="pagehead">OSINT LINKS</h2>           
		<div class="para2">
			<p class="parahead">This form is a work in progress and is continuously being updated.</p>
			
			<form method="get" action="search_name.php" class="osint_form">
				<div class="boxie">
				  <div class="container-1">
					  <span class="icon"><i class="fa fa-search"></i></span>
					  <input type="search" id="search" name="name" placeholder="Search for person...">
				  </div>
				</div>
			</form>
			
			<form method="get" action="search_uk_name.php" class="osint_form">
				<div class="boxie">
				  <div class="container-1">
					  <span class="icon"><i class="fa fa-search"></i></span>
					  <input type="search" id="search" name="name" placeholder="Search for person (UK Version)...">
				  </div>
				</div>
			</form>
			
			<form method="get" action="search_username.php" class="osint_form">
				<div class="boxie">
				  <div class="container-1">
					  <span class="icon"><i class="fa fa-search"></i></span>
					  <input type="search" id="search" name="username" placeholder="Search for username...">
				  </div>
				</div>
			</form>
			
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

	<?php else : header('Location: https://tpidg.us/login.php?sendtopage=projects/osint/'); endif; ?>
