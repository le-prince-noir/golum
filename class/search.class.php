<?php

include_once 'bao.class.php';

class search extends BoiteOutils{




	public function recherche(){

		$tablo = array(
			"z", "te", "q", "te", "te", "q"
			);

		$tabloMaj =array();

		for ($i=0; $i < count($tablo) ; $i++) {
			if(!in_array($tablo[$i], $tabloMaj)){
				$tabloMaj[$tablo[$i]] = 1;
			}else{
				$tabloMaj[$i] = $tabloMaj[$i] + 1;
			}
		};
		
var_dump($tabloMaj);
		$bd = parent::__construct();
$test ="aa";
		$images = $bd -> prepare("SELECT Nom FROM images WHERE Nom LIKE '".$test."%'");
		$images  -> execute();
		$AllImages = $images -> fetchAll(PDO::FETCH_ASSOC);
var_dump($AllImages);

	}


}