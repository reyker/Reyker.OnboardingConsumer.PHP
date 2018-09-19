<?php
class Decrypt {
        private $password = "lr1Jwa9IO6l6iF5EccZ8S5fAkFMwkkkfHKyzRLntrJQ=";
        private $salt = 'ReykerExample';
        private $iterations = 1000;
        private $keySize = 128;
        private $blockSize = 128;

        public function decryptData ($data)
        {
            $iv = base64_decode($data['iv']);
            $encrypted = base64_decode($data['ct']);
            $hash = $this->getEncryptionKey();
            //Using PKCS7 padding
            $decrypted = openssl_decrypt($encrypted, 'AES-128-CBC', $hash, OPENSSL_RAW_DATA, $iv);
            return $decrypted;
        }
        private function getEncryptionKey ()
        {
            return hash_pbkdf2("sha1", $this->password, $this->salt, $this->iterations, $this->keySize / 8, true);
        }
    }