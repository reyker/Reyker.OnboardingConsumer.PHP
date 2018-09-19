<?php


class Encrypt {

    public function encryptData ($data)
	{
		//16
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
        $hash = $this->getEncryptionKey();
		//Using PKCS7 padding
		$encrypted = openssl_encrypt($data, 'AES-128-CBC', $hash, OPENSSL_RAW_DATA, $iv);

        echo "\niv:\n"; echo base64_encode($iv) ;
        echo "\nencrypted:\n" ;echo base64_encode($encrypted) ;

        //echo "iv:" + base64_encode($iv) + "\n";
        //echo "encrypted:" + base64_encode($encrypted); + "\n";

		return ['iv' => base64_encode($iv), 'ct' => base64_encode($encrypted)];
	}
    private function getEncryptionKey ()
	{
        //update the password and salt with yours
        $password = "lr1Jwa9IO6l6iF5EccZ8S5fAkFMwkkkfHKyzRLntrJQ=";
        $salt = 'ReykerExample';
        $iterations = 1000;
        $keySize = 128;
        $blockSize = 128;
		return hash_pbkdf2("sha1", $password, $salt, $iterations, $keySize / 8, true);
	}

}


?>