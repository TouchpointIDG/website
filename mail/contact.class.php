<?php

class contact
{
    function send_text($email_content)
    {
        //recipients of the message
        $to = "number@vtext.com, number@messaging.sprintpcs.com, so on and so forth...";
        
        //subject changes based on priority level
        $email_subject = $email_content['Priority'] . " Priority - Website Contact Form\r\n";
        
        //initializes the variable
        $email_body = "";
        
        //loops through every item in the array and stores it in the email body
        foreach($email_content as $x => $x_value)
        {
            $email_body .= $x . " : " . $x_value . "\r\r";
        }
        
        $headers = "From: noreply@tpidg.us\n";
        
        //send it off
        mail($to, $email_subject, $email_body, $headers);
    }
    
    function send_email($email_content)
    {
        //recipients of the message
        $to = 'info@tpidg.us';
        
        //subject changes based on priority level
        $email_subject = $email_content['Priority'] . " Priority - Website Contact Form";
       
        //initializes the variable
        $email_body = "";
        
        //loops through every item in the array and stores it in the email body
        foreach($email_content as $x => $x_value)
        {
            $email_body .= $x . " : " . $x_value . "\r\r";
        }
        
        //headers to control who sent and who to reply to
        $headers = 'From: noreply@tpidg.us' . "\r\n";
        $headers .= 'Reply-to: ' . $email_content["Email"] . "\r\n";
        
        //encrypt message
        $encryptedMessage = $this->encryptMessage($email_body);
        
        //send it off
        mail($to,$email_subject,$encryptedMessage,$headers);
    }
    
    function send_reg_email ($to, $token)
    {   
        //subject changes based on priority level
        $email_subject = "Touchpoint Registration";
        
        $headers = "From: noreply@tpidg.us\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        //the message that sends to allow the users to verify and register
        //it contains html, so the above headers must be specified for it to display
        $message = "<!DOCTYPE html><html lang='en'><body><h1>Thank you for registering</h1>\r\n";
        $message .= "<h2>Please use the button to register and set up your account.</h2><br><a href=\"https://tpidg.us/dungeon/registration.php?token=$token \">Register</a></body></html>";
        
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
	
    function send_pass_reset_email ($to, $token)
    {   
        //subject changes based on priority level
        $email_subject = "Touchpoint Password Reset";
        
        $headers = "From: noreply@tpidg.us\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        //the message that sends to allow the users to reset their passwords
        //it contains html, so the above headers must be specified for it to display
        $message = "<!DOCTYPE html><html lang='en'><body><h2>You should probably be using a password manager. Check out one of these:</h2>\r\n";
        $message .= "<a href='https://pwsafe.org/'>Password Safe</a>\t\t<a href='http://keepass.info/'>KeePass</a>";
        $message .= "<h2>In the meantime, click this link to reset your password:</h2><br><a href=\"https://tpidg.us/dungeon/pass_reset.php?token=$token \">Reset Password</a></body></html>";
        
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
	function encryptMessage($message)
	{
		$gpg = new gnupg();
		
		//adds the encryption key by uid
		$gpg->addencryptkey("5C47777CA5AB888F42F1F78808B1DFCB5B8F88E4");
		
		//encrypts the message and returns it back to the calling function
		return $gpg->encrypt($message);
	}
}

?>
