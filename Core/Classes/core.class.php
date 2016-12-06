<?php

namespace Core\Classes;

class Core
{

	/**
	 * Provjerava da li je dati parametar closure (anonimna funkcija; funkcija koja nigdje nije definisana vec se kreira u parametru tupa nest(function(){echo 'Ovo je closure';});)
	 *
	 * @return bool
	 */

	public static function isClosure($closure) : bool{

		$reflection = new \ReflectionFunction($closure);

		return (bool) $reflection->isClosure();
	}

	/**
	 * Provjerava da li je php ekstenzija ucitana
	 * @param $name | string
	 *
	 * @return bool
	 */

	public static function isExtLoaded(string $name){

		return extension_loaded($name);
	}

	/**
	 * Metoda koja hashuje string i vraca array (niz) sa 3 polja
	 * @param $string | string - Rijec/string koju hashujemo (kriptujemo)
	 *
	 * @return hashed - Hashovan string
	 * @return salt - Random string koji se generisao te dodao u orginalan string kako bi krajnji hash bio sto sigurniji
	 * @return source - String koji je proslijeden u u metodu passwordHash (bez ikakvih izmjena dakle orginalan string)
	 */

	public static function passwordHash(string $string) : array{

		$hash['salt'] = hash('sha256', time() - 10000);
		$hash['hashed'] = hash('md5', $hash['salt'] . $string);
		$hash['source'] = $string;

		return $hash;
	}

	/**
	 * Uporeduje dva hasha
	 * @param $salt | string - string koji se dodaju stringu koji zelimo hashovat (za korisnicke lozinke on se nalazi u tablici: korisnici, polje: salt)
	 * @param $string | string - string koji zelimo hashovat
	 * @param $source | string - hashovan string sa kojim zelimo uporediti drugi string
	 *
	 * @return bool
	 */

	public static function compareHash(string $salt, string $string, string $source) : bool{

		$compare = hash('md5', $salt.$string);

		if($compare == $source) return true;
		else return false;
	}
	
	/**
	 * Provjerava da li je dati string validan email
	 * @param $email | string
	 * 
	 * @return bool
	 */

	public static function validEmail(string $email) : bool{

		if(strpos($email, '@') === false || strpos($email, '.') === false) return false;
		else return true;
	}
	
	/**
	 * Provjerava da li su dati stringovi validno ime i prezime
	 * 
	 * @param $firstname | string
	 * @param $lastname | string
	 *
	 * @return bool
	 */

	public static function validName(string $firstname, string $lastname) : bool{

		if(!preg_match("/^[a-zA-ZčšžđćČŠŽĐĆ'-]+$/", ''. $firstname .''. $lastname .'')) return false;
		else return true;
	}
}
?>