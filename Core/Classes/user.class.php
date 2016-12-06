<?php

namespace Core\Classes;

class User
{
	/**
	 * Varijabla koja govori da li je korisnik prijavljen ili ne 
	 */

	public $logged;

	/**
	 * Funkcija koja uzima sve potrebne informacije za prikaz profila
	 * @param $profile_id | int
	 *
	 * @return array
	 */

	public function getProfileInfo(int $profile_id){

		$q = "SELECT 	korisnici.id, korisnici.ime, korisnici.prezime, korisnici.avatar, korisnici.cover,
						skole.naziv AS naziv_skole, skole.grad,
						smjerovi.naziv AS naziv_smjera
			FROM korisnici
			INNER JOIN skole ON korisnici.skola = skole.id
			INNER JOIN smjerovi ON korisnici.smjer = smjerovi.id
			WHERE korisnici.id = :profile_id
			LIMIT 1";

		$profile_data = Object::$DB->Select($q, [':profile_id' => $profile_id]);

		if(isset($profile_data['ime']))
			return $profile_data;
		else
			return false;
	}

	/**
	 * https://www.youtube.com/watch?v=lsJLLEwUYZM I got broads in atlanta
	 * Funkcija koja vraca korisnikov ID iz baze
	 *
	 * @return mixed
	 */

	public function getID(){

		return $this->sessionValid(Object::$request->Cookie('srbc_'));
	}

	/**
	 * Funkcija koja vraca podatke korisnika iz baze
	 *
	 * @return mixed
	 */

	public function getInfo(){

		$userData = $this->sessionValid(Object::$request->Cookie('srbc_'));

		if($userData){
			$q = "SELECT id, ime, prezime, avatar, skola, razred, smjer FROM korisnici WHERE id = :id LIMIT 1";
			return Object::$DB->Select($q, [':id' => $userData]);
		} else
			return false;
	}

	/**
	 * Funkcija koja provjerava da li je korisnicka sesija validna
	 * Ako je valinda vraca true, ako ne false
	 *
	 * @param $ses_id | string
	 *
	 * @return mixed
	 */

	private function sessionValid(string $ses_id){

		$q		=	"SELECT expires_at, user_id FROM sesije WHERE id = :ses_id LIMIT 1";
		$data	=	Object::$DB->Select($q, [':ses_id' => $ses_id]);

		if(isset($data['expires_at']) && $data['expires_at'] >= time())
			return $data['user_id'];
		else 
			return false;
	}

	public static function CreateSession($user_id){
		$q = "INSERT INTO sesije (id, user_id, ip, expires_at, browser, version, os, useragent, created) VALUES (:id, :user_id, :ip, :expires_at, :browser, :version, :os, :useragent, :created)";

		$time = time();
		$session_id = RandString(5) . $time . RandString(6);
		$browser = GetBrowser();

		Object::$DB->Query($q, [
			':id'			=>		$session_id,
			':user_id'		=>		$user_id,
			':ip'			=>		GetIp(),
			':expires_at'	=>		$time + 62208000,
			':browser'		=>		$browser['name'],
			':version'		=>		$browser['version'],
			':os'			=>		GetOS(),
			':useragent'	=>		$browser['userAgent'],
			':created'		=>		$time
		]);

		return $session_id;
	}

	public static function DestroySession(){

		$q = "DELETE FROM sesije WHERE id = :id LIMIT 1";

		Object::$DB->Query($q, [
			':id'		=>	Object::$request->Cookie('srbc_')
		]);
	}
}

?>