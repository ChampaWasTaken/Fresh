<?php

namespace Core\Classes;

use Core\Classes\ObjectLoader;
use Core\Classes\User;
use Core\Classes\Core;

class Authentication
{

	public static function logout(){

		User::DestroySession();
		Object::$request->Cookie('srbc_', '0', time() - 3600);
	}

	public static function auth(){

		$account = Object::$DB->Select("SELECT id, password, salt FROM korisnici WHERE email = :email LIMIT 1", [
			':email'	=>	Object::$request->Post('login_email')
		]);

		if(isset($account['id'])){
			if(Core::compareHash($account['salt'], Object::$request->Post('login_lozinka'), $account['password'])){
				#Ako se poklapaju lozinke

				$session = User::CreateSession($account['id']);
				Object::$request->Cookie('srbc_', $session, time() + 62208000);

				echo '0';
			} else {
				#Ako se ne poklapaju lozike

				echo '2';
			}
		} else {
			#Ako ne postoji racun sa datim emailom

			echo '1';
		}
	}

	public static function registration(){
		$email = Object::$DB->Query("SELECT email FROM korisnici WHERE email = :email LIMIT 1", [':email' => Object::$request->Post('register_email')]);

		if(Object::$DB->CountRows($email) == 0){

			#Ako ne postoji...

			if(Object::$request->Post('register_razred') > 2)
				$smjer = Object::$request->Post('register_smjer');
			else
				$smjer = '';
			
			$q = "INSERT INTO korisnici (ime, prezime, password, salt, email, razred, smjer, registracija) VALUES
			(:ime, :prezime, :password, :salt, :email, :razred, :smjer, :registracija)";

			/**
			 * passwordHash(); je metoda koja hashuje string i vraca array (niz) sa 3 polja
			 * hashed - Hashovan string
			 * salt - Random string koji se generisao te dodao u orginalan string kako bi krajnji hash bio sto sigurniji
			 * source - String koji je proslijeden u u metodu passwordHash (bez ikakvih izmjena dakle orginalan string)
			 * Metoda se nalazi u klasi Core koja se nalazi u fajlu Core/Classes/core.class.php
			 */

			$password = Core::passwordHash(Object::$request->Post('register_lozinka'));

			Object::$DB->Query($q, [
				':ime'			=>		Object::$request->Post('register_ime'),
				':prezime'		=>		Object::$request->Post('register_prezime'),
				':password'		=>		$password['hashed'],
				':salt'			=>		$password['salt'],
				':email'		=>		Object::$request->Post('register_email'),
				':razred'		=>		Object::$request->Post('register_razred'),
				':smjer'		=>		$smjer,
				':registracija'	=>		time(),
			]);

			echo '0';
		} else {

			#Ako postoji, ispisujemo 1 kako bi javascript mogao izbaciti error

			echo '1';
		}
	}
}
?>