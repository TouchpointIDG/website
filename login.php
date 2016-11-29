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
		<title>Login to TPIDG</title>

		<!-- META TAGS-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Use this page to login to Touchpoint IDG, INC">
		<meta name="author" content="Touchpoint International Development Group, Inc.">
		<meta name="keywords" content="TPIDG, Touchpoint, IDG, International Development Group, INC, Touchpoint International Development Group, INC, login, dungeon, dragons">
		<meta name="google-site-verification" content="Yk6JHgiAcHxpIWzoNJyf6ErhFOtzgx-CuMcJsXHKffo" />

		<!-- CSS -->
		<link href="/css/main_styles.css" rel="stylesheet">
	</head>


	<body>
		<?php include("resources/navigation.php"); ?>

		<div class="bigbox">
			<div class="bigbox-inner">
				<h2 class="pagehead">Login and Registration Forms</h2>

				
				<?php if($_GET['attempt'] == "failed") : ?>

					<div id="login-forms">
						<div class="login">
							<h1 class="formprompts">Log in with your username and password.</h1>
							<form id="login-form" class="forms" name="login_form" action="dungeon/login_verification.php?<?php echo "sendtopage=" . $_GET['sendtopage']; ?>" method="post">
								<p style="color:red;font-size:10px;padding:0px;text-align:center;margin:0px;margin-top:11px;">Invalid Credentials</p>
								<input type="text" placeholder="Username" id="username-error" name="username">
								<input type="password" placeholder="Password" id="password-error" name="password">
								<a href="dungeon/request_password_reset.php?action=request" class="forgot">forgot password?</a>
								<input type="submit" value="Log In" id="login-submit">
							</form>
						</div>

						<div class="login" style="height: 200px;">
							<h1 class="formprompts">Enter your email to register.</h1>
							<form id="login-form" class="forms" name="login_form" action="dungeon/register.php" method="post">
								<input type="email" name="email" placeholder="Email..." id="email">
								<input type="submit" name="submit" value="Register" id="login-submit">
							</form>
						</div>
					</div>

				<?php else : ?>

					<div id="login-forms">
						<div class="login">
							<h1 class="formprompts">Log in with your username and password.</h1>
							<form id="login-form" class="forms" name="login_form" action="dungeon/login_verification.php?<?php echo "sendtopage=" . $_GET['sendtopage']; ?>" method="post">
								<input type="text" placeholder="Username" id="username" name="username">
								<input type="password" placeholder="Password" id="password" name="password">
								<a href="dungeon/request_password_reset.php?action=request" class="forgot">forgot password?</a>
								<input type="submit" value="Log In" id="login-submit">
							</form>
						</div>


						<div class="login" style="height: 200px;">
							<h1 class="formprompts">Enter your email to register.</h1>
							<form id="login-form" class="forms" name="login_form" action="dungeon/register.php" method="post">
								<input type="email" name="email" placeholder="Email..." id="email">
								<input type="submit" name="submit" value="Register" id="login-submit">
							</form>
						</div>
					</div>

				<?php endif; ?>

			</div>
		</div>

		<?php include("resources/footer.php"); ?>

		<!-- Core JavaScript -->
		<script src="/js/jquery-1.12.4.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/rollover.js"></script>

		<?php include_once("resources/analytics.php"); ?>

	</body>
</html>
