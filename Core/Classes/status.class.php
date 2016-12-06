<?php

namespace Core\Classes;

use Core\Traits\TextParser;

class Status
{
	use TextParser;

	/**
	 * Funkcija koja lajka/dislajka status
	 *
	 * @param $status_id | int
	 * @param $user_id | int
	 */

	public function statusToggleLike(int $status_id, int $user_id) : bool{

		$q = Object::$DB->Query("SELECT tip FROM lajkovi WHERE status_id = :status AND user_id = :user LIMIT 1", [
				':status'	=>	$status_id,
				':user'		=>	$user_id
			]);

		if(Object::$DB->CountRows($q) == 0)
			return $this->likeStatus($status_id, $user_id);
		else
			return $this->unlikeStatus($status_id, $user_id);
	}

	/**
	 * Funkcija koja lajka status | poziva se u statusToggleLike()
	 *
	 * @param $status_id | int
	 * @param $user_id | int
	 */

	private function likeStatus(int $status_id, int $user_id) : bool{

		$q = "INSERT INTO lajkovi (status_id, user_id) VALUES (:status, :user)";

		Object::$DB->Query($q, [
			':status'	=>	$status_id,
			':user'		=>	$user_id
		]);

		return true;
	}

	/**
	 * Funkcija koja unlajka status | poziva se u statusToggleLike()
	 *
	 * @param $status_id | int
	 * @param $user_id | int
	 */

	private function unlikeStatus(int $status_id, int $user_id) : bool{

		$q = "DELETE FROM lajkovi WHERE status_id = :status AND user_id = :user";
		
		Object::$DB->Query($q, [
			':status'	=>	$status_id,
			':user'		=>	$user_id
		]);

		return false;
	}

	/**
	 * https://www.youtube.com/watch?v=3GwjfUFyY6M Its a celebratiooooon!!!
	 *
	 * Funkcija kojom uzimamo komentare iz baze
	 *
	 * @param $status_id | int
	 * @param $limit | int
	 * @param $offset | int
	 *
	 * @return array
	 */

	public function getStatusComments(int $status_id, int $limit = 10, int $offset = 0){

		$q = "SELECT 	komentari.id, komentari.tekst, komentari.timestamp,
						korisnici.id AS userid, korisnici.ime, korisnici.prezime, korisnici.avatar
				FROM komentari
				INNER JOIN korisnici ON komentari.poster_id = korisnici.id
				WHERE komentari.status_id = :status_id
				ORDER BY komentari.id DESC
				LIMIT :start, :max";

		$komentari = Object::$DB->Select($q, [
			':status_id'	=>		$status_id,
			':start'		=>		$offset,
			':max'			=>		$limit
		], true);

		$kCount = count($komentari);

		for($i = 0; $i < $kCount; $i ++)
			if(isset($komentari[$i]['id']))
				$komentari[$i]['tekst'] = $this->parseText($komentari[$i]['tekst']);

		return $komentari;
	}

	/**
	 * Funkcija koja uzima statuse sa zadanog profila
	 * @param $profile_id | int
	 * @param $limit | int
	 * @param $offset | int
	 *
	 * @return array
	 */

	public function getProfileStatuses(int $profile_id, int $limit = 10, int $offset = 0){

		$q = "SELECT 	statusi.id, statusi.timestamp, statusi.lajkovi, statusi.komentari, statusi.tekst,
						lajkovi.tip AS lajktip
			FROM statusi
			LEFT JOIN lajkovi ON statusi.id = lajkovi.status_id
			WHERE statusi.poster = :profile_id
			GROUP BY statusi.id
			ORDER BY statusi.id DESC
			LIMIT :start, :max";

		$statuses = Object::$DB->Select($q, [
			':profile_id' => $profile_id,
			':start' => $offset,
			':max' => $limit
		], true);
		$sCount = count($statuses);
		for($i = 0; $i < $sCount; $i ++)
			if(isset($statuses[$i]['id']))
				$statuses[$i]['tekst'] = $this->parseText($statuses[$i]['tekst']);
			
		return $statuses;
	}
}
?>