<?php

namespace Core\Classes;

class Crypto
{
	public static function encrypt($string = false){
		if(!$string) return false;
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
		$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, Config::Get('crypto_key'), $string, MCRYPT_MODE_ECB, $iv);
		return trim(base64_encode($crypttext));
	}

	public static function decrypt($string = false){
		if(!$string) return false;
		$crypttext = base64_decode($string); //dekodiramo string
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
		$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, Config::Get('crypto_key'), $crypttext, MCRYPT_MODE_ECB, $iv);
		return trim($decrypttext);
	}
}

?>