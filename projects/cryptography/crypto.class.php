<?php

	//this class will contain all encode/decode and encrypt/decrpyt functions
	//more so for educational purposes
	//i am sure there are better ways to do these
	class crypto 
	{
		//this function takes a plaintext string and a number between 1 and 26
		//and encodes the string with the Caesar Cipher using the key as the shift number
		function encodeCaesar($str, $key)
		{
			//if the form is set up properly, this if statement won't matter
			//on the off chance the form is messed up or someone is too smart for their own good,
			//this will stop them from doing anything stupid
			if($key > 0 && $key <= 26)
			{
				//initialize the ciphertext with an empty string
				$ciphertext = "";
				
				//loops through the string to the end of the string 
				for($i = 0; strlen($str) > $i; $i++)
				{
					//if it's numeric just add it to the ciphertext
					//this is necessary because Caesar Cipher didn't originally have numbers
					if(is_numeric($str[$i]))
					{
						$ciphertext .= $str[$i];
					}
					else
					{
						//grab the character at the current index
						$char = $str[$i];
						
						//initialize count to zero
						$count = 0;
						//this loop is where the actual conversion takes place
						//it loops through until the loop counter matches the key size
						while($count < $key)
						{
							//increments char
							++$char;
							//increments my loop counter
							$count++;
						}
						
						//when you increment chars, they add an extra character when you pass 'z'
						//to prevent this, it will check if it's more than a character long
						//then it will just take the second character in the string				
						if(strlen($char) > 1)
						{
							//adds the second char to the existing ciphertext
							$ciphertext .= $char[1];
						}
						else
						{
							//adds the current char to the existing ciphertext
							$ciphertext .= $char;
						}
					}
				}
				
				//if all goes well, it should return encoded text
				return $ciphertext;
			}
			else
			{
				return "stop being naughty";
			}
		}
		
		//runs through every possible combination of the Caesar Cipher
		function bruteForceCaesar($str)
		{
			$ciphertexts = array();
			
			//loops through 26 times
			for($i = 1; $i <= 26; $i++)
			{
				$ciphertexts[] = $this->encodeCaesar($str, $i);
			}
			
			return $ciphertexts;
		}
		
		
		
	}

?>
