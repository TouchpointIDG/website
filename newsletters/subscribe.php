<?php

	if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		require '../mail/contact.class.php';
		
		$contact = new contact();
		
		$contact->subscribeToNewsletter($_POST['email']);
		
		header('Location:https://tpidg.us/newsletters.php');
	}
	else
	{
		header('Location:https://tpidg.us/newsletters.php');
	}

?>
