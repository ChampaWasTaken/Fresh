<?php

namespace Core\Classes;

class Search
{
	public static function simplePretraga(string $query, int $limit = 8) : array{


		Object::$DB->Query("SET @searchQuery = :query", [':query' => "%". $query ."%"]);

		$q = "SELECT korisnici.id, korisnici.ime, korisnici.prezime, korisnici.avatar,
				skole.naziv, skole.grad
			FROM korisnici
			INNER JOIN skole ON korisnici.skola = skole.id
			WHERE korisnici.ime LIKE @searchQuery OR korisnici.prezime LIKE @searchQuery OR
			CONCAT(korisnici.ime,' ',korisnici.prezime) LIKE @searchQuery
			LIMIT :max";

		return Object::$DB->Select($q, [
			':max'		=>	$limit
		], true);
	}
}
?>