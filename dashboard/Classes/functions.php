<?php 

	class Encript{
		public static function funEncrypt($String)
		{
			$Key = "XG5se259VG7CgjklMjA="; // Llave con cifrado ASCII | llave cifrada: XG5se259VG7CgjklMjA= llave decifrada: SecretKey
			$CipherText = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($Key), $String, MCRYPT_MODE_CBC, md5(md5($Key))));
			return $CipherText;
		}
	}
?>