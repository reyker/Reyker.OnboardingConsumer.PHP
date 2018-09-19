# Reyker.OnboardingConsumer.PHP
Sample Application for the Reyker Onboarding



# Environment Setup
	Following variables will be changes as per the environment.
			1. URL: 
							File: index.php
							Line: $url = 'https://reykeronboardingstaging.azurewebsites.net' . '/api/Onboarding/';
							
							Change this to the url as required for staging, external test etc.
							
			2. Auth Token:
							File index.php
							Line: $authToken = 'Reyker ReykerInternalTestAccount';
							Change this to the auth token that was provided by Reyker.
							
			3. Encryption Password:
							File: Encrypt.php
							Line:
										$password = "lr1Jwa9IO6l6iF5EccZ8S5fAkFMwkkkfHKyzRLntrJQ=";
										Replace it with the password provided by Reyker.
			4. Encryption Salt:
							File: Encrypt.php
							Line:
        						$salt = 'ReykerExample';
										
										Replace it with the salt provided by Reyker.
			
			3. Decryption Password:
							File: Decrypt.php
							Line:
										$password = "lr1Jwa9IO6l6iF5EccZ8S5fAkFMwkkkfHKyzRLntrJQ=";
										Replace it with the password provided by Reyker.
			4. Decryption Salt:
							File: Decrypt.php
							Line:
        						$salt = 'ReykerExample';
										
										Replace it with the salt provided by Reyker.
