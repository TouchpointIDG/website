<!-- Navigation -->
<nav class="navbar">
        
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
			<span class="sr-only"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<a class="navbar-brand" href="index.php">
			<img src="/img/tplogo.png" class="logo" alt="Touchpoint IDG INC">
			<img src="/img/SDVOSB2.png" class="logo" id="sdvosb" alt="SDVOSB">
		</a>
	</div>
	
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="navbar-collapse collapse" id="bs-navbar">
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a class="topmenu" href="/index.php">HOME</a>
			</li>
			<li>
				<a class="topmenu" href="/about.php">ABOUT US</a>
			</li>
			<li>
				<a class="topmenu" href="/careers.php">CAREERS</a>
			</li>
			<li>
				<a class="topmenu" href="/newsletters.php">NEWSLETTERS</a>
			</li>
			<li>
				<a class="topmenu" href="/contact.php">CONTACT US</a>
			</li>
			
			<?php
				session_start();
				if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") :
			?>
				<li>
					<a class="topmenu" href="/login.php?logout=true">LOGOUT</a>
				</li>	
				
			<?php else : ?>
			
				<li>
					<a class="topmenu" href="/login.php">LOGIN</a>
				</li>	
				
			<?php endif; ?>	

		</ul>
	</div>            
</nav>


