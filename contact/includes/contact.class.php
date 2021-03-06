<?php

  class contact
  {
    function communicateWithAdmins($contentArray, $priority)
    {
  		//change later
  		$key = "";
      $email_body = "";

  		//loops through every item in the array and stores it in the email body
      foreach($contentArray as $x => $x_value)
      {
          $email_body .= $x . " : " . $x_value . "\r\r";
      }

      $client_email = $contentArray["Email"];

		  //encrypt message both with PGP and AES
      $content = $this->encryptMessage($email_body);

      $encryptedStoredMessage = $this->encryptMessageSymmetric($contentArray, $key);

      $link = $client_email . uniqid();

      $this->storeEncryptedMessage($encryptedStoredMessage, "/var/www/html/contact/history/" . $link);

  		//based on the priority level, it sends the approriate alerts
  		switch($priority)
  		{
  			case "Low":
  				$this->send_email($content, $client_email, $priority);
  				break;
  			case "Medium":
  				$this->send_email($content, $client_email, $priority);
  				break;
  			case "High":
  				$this->send_email($content, $client_email, $priority);
  				$this->send_text($content, $client_email, $priority);
  				break;
  			default :
  				$this->send_email($content, $client_email, $priority);
  				break;
  		}
    }

    private function send_text($email_content, $client_email, $priority)
    {
      //recipients of the message
      $to = "";

      //subject changes based on priority level
      $email_subject = $priority . " Priority - Website\r\n";

      //initializes the variable
      $email_body = "Message from " . $client_email . ". Log in to view message.";

      $headers = "From: noreply@tpidg.us\n";

      //send it off
      mail($to, $email_subject, $email_body, $headers);
    }

    private function send_email($email_body, $client_email, $priority)
    {
      //recipients of the message
      $to = 'website@tpidg.us';

      //subject changes based on priority level
      $email_subject = $priority . " Priority - Website Contact Form";

      //headers to control who sent and who to reply to
      $headers = 'From: noreply@tpidg.us' . "\r\n";
      $headers .= 'Reply-to: ' . $client_email . "\r\n";

      //send it off
      mail($to,$email_subject,$email_body,$headers);
    }

    function send_reg_email ($to, $token)
    {
      //subject changes based on priority level
      $email_subject = "TPIDG Registration";

      $headers = "From: noreply@tpidg.us\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      //the message that sends to allow the users to verify and register
      //it contains html, so the above headers must be specified for it to display
      $message = "<!DOCTYPE html><html lang='en'><body><h1>Thank you for registering</h1>\r\n";
      $message .= "<h2>Please use the button to register and set up your account.</h2><br><a href=\"https://secure.tpidg.us/registration/register.php?token=$token \">Register</a></body></html>";

      //send it off
      if(mail($to,$email_subject,$message,$headers))
      {
			  return true;
		  }
      else
      {
			  return false;
		  }
	  }

    function sendPassResetEmail ($to, $token)
    {
      //subject changes based on priority level
      $email_subject = "TPIDG Password Reset";

      $headers = "From: noreply@tpidg.us\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      //the message that sends to allow the users to reset their passwords
      //it contains html, so the above headers must be specified for it to display
      $message = "<!DOCTYPE html><html lang='en'><body><h2>You should probably be using a password manager. Check out one of these:</h2>\r\n";
      $message .= "<a href='https://pwsafe.org/'>Password Safe</a>\t\t<a href='http://keepass.info/'>KeePass</a>";
      $message .= "<h2>In the meantime, click this link to reset your password:</h2><br><a href=\"https://secure.tpidg.us/login/pass_reset.php?token=$token \">Reset Password</a></body></html>";

      //send it off
      if(mail($to,$email_subject,$message,$headers))
      {
			  return true;
		  }
      else
      {
			  return false;
		  }
	  }

	  function send_broadcast_email ($to, $content)
    {
      //subject changes based on priority level
      $email_subject = "Touchpoint Information Broadcast";

      $headers = "From: admin@tpidg.us\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      //the message that sends to allow the users to verify and register
      //it contains html, so the above headers must be specified for it to display
  		$message = "All,\r\n\r\n";
  		$message .= $content;
  		$message .= "\r\n\r\nV/R<br><br>\r\n\r\nTouchpoint Admin<br>\r\nadmin@tpidg.us<br>\r\n<a href='https://tpidg.us'>https://tpidg.us</a>";

      //send it off
      if(mail($to,$email_subject,$message,$headers))
      {
			  return true;
		  }
      else
      {
			  return false;
		  }
	  }

  	//## This function encrypts messages with info@tpidg.us public PGP key ##
  	private function encryptMessage($message)
  	{
  		$gpg = new gnupg();

  		//adds the encryption key by uid
  		$gpg->addencryptkey("5C47 777C A5AB 888F 42F1  F788 08B1 DFCB 5B8F 88E4");

  		//encrypts the message and returns it back to the calling function
  		return $gpg->encrypt($message);
  	}

  	//## This function encrypts a message with AES-256-CTR ##
  	private function encryptMessageSymmetric($message, $key)
  	{
  		//an initialization vector based on random bytes grabbed from the kernel
  		$iv = random_bytes(openssl_cipher_iv_length('aes-256-ctr'));

      $message = serialize($message);

  		//gotta have an hmac taken before the message gets encrypted
  		$hmac = hash_hmac('sha256', $message, $key);

  		//short of writing my own crypto, openssl is the best bet for this situation
  		//it should be noted I chose ctr mode because it worked best for this use case
  		$encrypted = openssl_encrypt($message, 'aes-256-ctr', $key, 0, $iv);

  		//return the encrypted string in human readable format as base64
  		//string format:	encryptedstring:iv:hmac
  		return base64_encode($encrypted . ':' . $iv . ':' . $hmac);
  	}

  	//## This function decrypts a message with AES-256-CTR ##
  	function decryptMessageSymmetric($message, $key)
  	{
  		//pulls the encrypted data, the hmac and the iv apart
  		$parts = explode(':', $message);

  		//decrypts the encrypted message using the first two parts of the string
  		$plaintext = openssl_decrypt($parts[0], 'aes-256-ctr', $key, 0, $parts[1]);

  		//takes an hmac of the decrypted string
  		$hmac_taken = hash_hmac('sha256', $plaintext, $key);

  		//compares the hmacs to confirm data integrity
  		if($parts[2] == $hmac_taken)
  		{
  			//if it matches, return the decrypted string
  			return unserialize($plaintext);
  		}
  		else
  		{
  			//if it doesn't match, return an error message
  			return "hmacs do not match";
  		}
  	}

  	//## Stores the encrypted message as file ##
  	private function storeEncryptedMessage($message, $filename)
  	{
  		//creates a new file
  		$myfile = fopen($filename, "w") or die("Error! Try again.");

  		//writes to the new file
  		fwrite($myfile, $message);

  		//closes the file
  		fclose($myfile);
  	}

  	function subscribeToNewsletter($email)
  	{
  		//recipients of the message
      $to = 'info@tpidg.us';

      //subject changes based on priority level
      $email_subject = "Newsletter Subscription Request";

      //email body
      $email_body = $email . " is requesting to be added to the digital update email list.";

      //headers to control who sent
      $headers = 'From: noreply@tpidg.us' . "\r\n";

      //send it off
      mail($to,$email_subject,$email_body,$headers);
  	}

    function sendInvoice($to, $customerID, $invoiceID)
    {
      //subject with invoice number in it
      $email_subject = "Invoice #" . $invoiceID . " From Touchpoint";

      $headers = "From: sales@tpidg.us\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      //sends an invoice to the specific recipient
      //it contains html, so the above headers must be specified for it to display
      $message = "<!DOCTYPE html><html lang='en'><body style='background-color: grey; text-align: center;'><h3 style='color: white;'>You have been sent an invoice from Touchpoint IDG Inc. Click the button below to view and pay the invoice.</h3>\r\n";
      $message .= "<a style='background-color: white; color: black; border: solid 1px black; padding: 2px;' href='https://store.tpidg.us/order/invoices/pay_invoice.php?invoice=" . $customerID . "'>Pay Invoice</a>";
      $message .= "</body></html>";

      //send it off
      if(mail($to,$email_subject,$message,$headers))
      {
			  return true;
		  }
      else
      {
			  return false;
		  }
    }
  }

?>
