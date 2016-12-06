<?php

namespace Core\Classes;

class Chat
{
	public function loadConversation(int $user_1, int $user_2, int $offset = 0, int $limit = 10) : array{

		$q = "SELECT 	CONCAT(korisnici.ime ,' ', korisnici.prezime) AS imeprezime, korisnici.avatar,
						korisnici.id AS kid,
						poruke.id, poruke.tekst, poruke.timestamp, poruke.pogledano, poruke.file,
						fajlovi.naziv
			FROM korisnici INNER JOIN poruke ON
			korisnici.id = poruke.sender
			LEFT JOIN fajlovi ON
			poruke.file = fajlovi.id
			WHERE (poruke.sender = :user_1 AND poruke.reciever = :user_2) OR
			(poruke.sender = :user_2 AND poruke.reciever = :user_1)
			GROUP BY poruke.id
			ORDER BY poruke.timestamp DESC
			LIMIT :start, :max";

		$results = array_reverse(Object::$DB->Select($q, [
			':user_1'	=>	$user_1,
			':user_2'	=>	$user_2,
			':start'	=>	$offset,
			':max'		=>	$limit
		], true));
		$resCount = count($results);

		for($i = 0; $i < $resCount; $i ++)
			if(!$results[$i]['file'])
				$results[$i]['tekst'] = Crypto::decrypt($results[$i]['tekst']);
			else
				$results[$i]['tekst'] = '<a href="filedw/'. $results[$i]['file'] .'" target="_blank">
					<i class="fa fa-file"></i> '. $results[$i]['naziv'] .'
				</a>';

		return $results;
	}

	public function loadList(int $user_id, int $limit = 10, int $offset = 0) : array{

		$q = "SELECT	poruke.id, poruke.sender, LEFT(poruke.tekst, 150) AS tekst, poruke.timestamp,
						CONCAT(korisnici.ime, ' ', korisnici.prezime) AS imeprezime, korisnici.avatar
			FROM 
			   (SELECT
					MAX(poruke.id) AS maxID, poruke.sender
				FROM 
				   poruke 
				WHERE
				   poruke.reciever = :reciever
				GROUP BY
					poruke.sender) MesQuery
			
			INNER JOIN korisnici ON
			korisnici.id = MesQuery.sender
			INNER JOIN poruke ON
			korisnici.id = poruke.sender
			WHERE poruke.id = MesQuery.maxID AND poruke.reciever = :reciever AND poruke.file IS NULL
			GROUP BY poruke.sender
			ORDER BY poruke.timestamp DESC
			LIMIT :start, :max";

		$results = Object::$DB->Select($q, [
			':reciever'	=>	$user_id,
			':start'	=>	$offset,
			':max'		=>	$limit
		], true);

		$resCount = count($results);

		for($i = 0; $i < $resCount; $i ++)
			$results[$i]['tekst'] = Crypto::decrypt($results[$i]['tekst']);

		return $results;
	}

	public function insertMessage(int $sender, int $reciever, string $text, $file = 0){

		if($file == 0){
			$q = "INSERT INTO poruke (sender, reciever, tekst, timestamp) VALUES (:sender, :reciever, :tekst, :timestamp)";

			return Object::$DB->Query($q, [
				':sender'		=>	$sender,
				':reciever'		=>	$reciever,
				':tekst'		=>	Crypto::encrypt($text),
				':timestamp'	=>	time()
			]);
		} else {
			$q = "INSERT INTO poruke (sender, reciever, tekst, timestamp, file) VALUES (:sender, :reciever, :tekst, :timestamp, :file)";

			return Object::$DB->Query($q, [
				':sender'		=>	$sender,
				':reciever'		=>	$reciever,
				':tekst'		=>	Crypto::encrypt($text),
				':timestamp'	=>	time(),
				':file'			=>	$file
			]);
		}
	}
}
?>