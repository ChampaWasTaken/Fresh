<?php

namespace Core\Classes;

use Core\Traits\Image;

require_once ("../Core/Traits/image.trait.php");

class File
{

	use Image;

	/**
	 * Maksimalna dozvoljena velicina slike 
	 */

	private $max_size_image = 3145728;

	/**
	 * Maksimalna dozvoljena velicina fajla
	 */

	private $max_size_file = 3145728;

	/**
	 * Dozvoljene ekstenzije slika
	 */

	private $image_extensions = ['jpeg','jpg','png', 'gif'];

	/**
	 * Dozvoljene ekstenzije fajlova
	 */

	private $file_extensions = ['txt','log','doc', 'docx', 'xlsx', 'pptx', 'psd'];

	/**
	 * uploadImageToServer
	 * @param $file | array - niz koji sadrzi sve infomacije o fajlu koji se upladuje
	 * @param $user_id | int - id korisnika koji uploaduje fajl
	 *
	 * https://www.youtube.com/watch?v=r6E3J4GPpjc 
	 */

	public function uploadImageToServer(array $file, int $user_id){

		$file_name 		= 		RandString(5) . '-'. time() .'-'. $user_id .'_'. $file['name'];
		$file_size 		= 		$file['size'];
		$file_tmp 		= 		$file['tmp_name'];
		$value 			= 		explode(".", $file['name']);
		$file_ext 		= 		strtolower(array_pop($value));

		if(in_array($file_ext, $this->image_extensions) === false){
			echo 'err01EXT';
		} else if($file_size > $this->max_size_image){
			echo 'err02MAX';
		} else {
			$path = 'Storage/Images/Uploads/'. $file_name;
			move_uploaded_file($file_tmp, $path);
			$this->StripExif($path, 80, $file_ext);
			echo '<img src="'. $path .'" class="chatbox_image materialboxed" data-caption="'. date("M d, Y") .' u '. date("H:i") .'" alt="Slika">';
		}
	}

	/**
	 * uploadFileToServer
	 * @param $file | array - niz koji sadrzi sve infomacije o fajlu koji se upladuje
	 * @param $user_id | int - id korisnika koji uploaduje fajl
	 *
	 * https://www.youtube.com/watch?v=mk48xRzuNvA
	 */

	public function uploadFileToServer(array $file, int $user_id){
		$file_name 		= 		RandString(5) . '-'. time() .'-'. $user_id .'_'. $file['name'];
		$file_size 		= 		$file['size'];
		$file_tmp 		= 		$file['tmp_name'];
		$value 			= 		explode(".", $file['name']);
		$file_ext 		= 		strtolower(array_pop($value));

		if(in_array($file_ext, $this->file_extensions) === false){
			echo 'err01EXT';
		} else if($file_size > $this->max_size_file){
			echo 'err02MAX';
		} else {
			$path = 'Storage/Files/Uploads/'. $file_name;
			move_uploaded_file($file_tmp, $path);

			$q = "INSERT INTO fajlovi (naziv, path, type, created, creator) VALUES (:naziv, :path, :type, :created, :creator)";
			Object::$DB->Query($q, [
				':naziv'	=>	$file['name'],
				':path'		=>	$path,
				':type'		=>	$file_ext,
				':created'	=>	time(),
				':creator'	=>	$user_id
			]);

			echo '{"id":"'. Object::$DB->LastID() .'", "tip":"'. $file_ext .'", "naziv":"'. $file['name'] .'"}';
		}
	}
}
?>