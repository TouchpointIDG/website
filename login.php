<?php

    if($_GET['logout'] == "true")
    {
  		session_start();
  		$_SESSION['loggedin'] = "";
  		$_SESSION = array();
  		session_destroy();
  		header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Login | Touchpoint IDG | TPIDG.US</title>

		<!-- META TAGS-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Use this page to login to Touchpoint IDG, INC">
		<meta name="author" content="Touchpoint International Development Group, Inc.">
		<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, login, dungeon, dragons">

		<!-- CSS -->
		<link href="/css/main_styles.new.css" rel="stylesheet">
	</head>


	<body>
    <div id="wrapper">
      <?php include("resources/navigation.new.php"); ?>

			<div id="content">

        <div class="para col2">
          <p class="para-desc">Log in with your username and password.</p>
  				<form id="login-form" class="forms" name="login_form" action="dungeon/login_verification.php?<?php echo "sendtopage=" . $_GET['sendtopage']; ?>" method="post">
  					<h4 class="<?php if($_GET['le'] == true){echo 'error-message-display';}else{echo 'error-message-hide';} ?>">Invalid Credentials</h4>
  					<input type="text" placeholder="Username" class="login-input input-block <?php if($_GET['le'] == true){echo 'input-error';} ?>" name="username">
  					<input type="password" placeholder="Password" class="login-input input-block <?php if($_GET['le'] == true){echo 'input-error';} ?>" name="password">
  					<input type="submit" value="Log In" id="login-submit">
            <button onclick="window.open('dungeon/request_password_reset.php?action=request')" id="login-submit">forgot password?</button>

  				</form>
        </div>

        <div class="para col2">
          <p class="para-desc">Enter your email to register.</p>
  				<form id="login-form" class="forms" name="login_form" action="dungeon/register.php" method="post">
  					<input type="email" name="email" placeholder="Email..." class="login-input input-block <?php if($_GET['r'] == true){echo 'input-error';} ?>">
  					<input type="submit" name="submit" value="Register" id="login-submit">
  				</form>
        </div>

			</div>

		  <?php include("resources/footer.new.php"); ?>
    </div>

    <?php include("resources/footer_scripts.php"); ?>

	</body>
</html>
