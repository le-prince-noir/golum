<?php

include_once 'bao.class.php';

include_once 'view.class.php';

class search extends BoiteOutils{




	public function recherche(){
		if(isset($_POST['frmSearch'])){

			$tabloMaj =array();


			$bd = parent::__construct();
			$clef = $bd -> prepare("SELECT motClef FROM images");
			$clef  -> execute();
			$allClef = $clef  -> fetchAll(PDO::FETCH_ASSOC);
			//var_dump($allClef);


			for ($i=0; $i < count($allClef) ; $i++) {
				if($allClef[$i]['motClef'] != ""){
					$tablo = explode(',', $allClef[$i]['motClef']);
					foreach ($tablo as $key => $value) {
						$value = trim($value);
						if($value != ""){
							$nb = (isset($tabloMaj[$value])) ? $tabloMaj[$value] : 0;
							$tabloMaj[$value] = $nb + 1;
						}

					}
				}
			}

			//var_dump($tabloMaj);
			$tabloMaj =array_keys($tabloMaj);

			//var_dump($tabloMaj);
			$images = $bd -> prepare("SELECT URL, Nom FROM images WHERE motClef LIKE '%".$_POST['search']."%'");
			$images  -> execute();
			$AllImages = $images -> fetchAll(PDO::FETCH_ASSOC);
			//var_dump($AllImages);

			view::search($AllImages);

		}else{
			include_once 'views/user/frmSearch.php';
		}
	}

}