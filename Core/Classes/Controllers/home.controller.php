<?php

use Core\Classes\Controller;

/**
 * Ovo su ti doticni kontroleri
 * Svaki kontroler treba da extenduju (prosiruje) klasu Controller
 * Kontrolere sam napravio sa nekim "asistentima" tako da odma mozete lagano uciti
 * U svakom kontroleru imamo "asistenta" za sljedece:
 * 		Konekciju sa bazom - $this->DB
 * 		Prikazivanje template-ova (prikazivanje htmla i toga) - $this->template
 * 		Uzimanje parametara zahtjeva (GET/POST/SESSION/COOKIE) - $this->request
 * 		Pisanje log fajlova - $this->log
 * 		Upravljanje sa fajlovima - $this->filesystem
 * Template-ovi se nalaze u folderu Public/Templates/Views
 * Sve ove "asistente" odnosno njihove klase mozete pronaci u folderu Core/Classes
 * Klasu za bazu mozete pronaci u Core/Database
 */

class HomeController extends Controller
{

	/**
	 * Primjer obicne metode kontrolera koja prikazuje template bez ikakvih varijabli
	 */

	public function index(){

		// Ovdje takodje mozete pisati neke kalkulacije, uslove itd jer je uostalom ovo obicna funkcija
		// Sve sto napisete poslje ovog ispod returna, nece se dogoditi
		return $this->template->view('index');
	}

	/**
	 * Ako pogledate kako smo dodali link putanju za ovu metodu vidjet cete da smo napravili /linkparametar/{id}
	 * To {id} je ustvari parametar u linku koju prosljedjujemo kao parametar za ovu metodu
	 * Naci ako link bude /linkparametar/1 u funkciju ce se proslijediti parametar 1
	 * Tako cemo dobiti metodu linkparametar(1)
	 * Probajte otici na http://localhost/linkparametar/nesta pa vidite sta ce vam ispisati
	 */

	public function linkparametar(int $id){

		echo $id;
	}

	/**
	 * Na ovoj metodi takodje imamo link parametar ali imamo i "pricanje" sa bazom kao i prikazivanje template-a
	 * Metoda $this->template->view() prima 2 parametra a to su:
	 * 			Varijabla	|	Vrsta
	 * @param Ime templata | String
	 * @param Niz varijabli koje saljemo u template | Array
	 *
	 * Klasa baze ima dvije glavne funkcije a to su:
	 * $this->DB->Query() (Obavlja standardne querye(upite) i ne vraca nikakvu vrijednost sem da li je query uspjesno izvrsen ili ne)
	 * $this->DB->Select() (Sluzi za SELECT querye te returna(vraca) sve podatke iz baze u obliku PHP niza tako da im mozete lako pristupiti)
	 * Dakle onaj link parametar prosljedjujemo u metodu bazaprimjer()
	 * Iz funkcije returnamo template koji ce se prikazati u browseru
	 * Taj template se zove baza te se nalazi u Public/Templates/Views/baza.tpl
	 * Prosljedjujemo varijablu "bazaVar" u taj template te joj dajemo vrijednost onoga sto se izvuce iz baze
	 * Iz baze vucemo polje username IZ tablice korisnici GDJE je id reda jednak link parametru koji smo unijeli u browser 
	 */

	public function bazaprimjer(int $id){

		return $this->template->view('baza', [
			'bazaVar'	=>	$this->DB->Select("SELECT username FROM korisnici WHERE id = :id", [
					':id'	=>	$id
				])
		]);
	}
}
?>