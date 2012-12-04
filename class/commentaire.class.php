<?php

include_once 'bao.class.php';

class commentaire extends BoiteOutils{

	private $erreurs = array();
	private $tabForm = array();
	private $messageErreur;
	private $result;

	public function afficheImage($idImage){
		echo "coucou n°".$idImage."<br/>";
		$bd = parent::__construct();
		if($bd){
			$recup_img = $bd -> prepare("SELECT * FROM images WHERE id_images=:id_images");
			$recup_img -> bindParam(":id_images", $idImage);
			$recup_img -> execute();

			$nb = $recup_img -> rowCount();

			// si la variable nb est supp à 0 c'est que l'utilisateur est dans la bdd, donc c'est un membre
			if($nb > 0){
				$imgInfos = $recup_img -> fetch(PDO::FETCH_ASSOC);
				echo "Liste de infos liés à l'image <br/>";
				var_dump($imgInfos);
				include_once "views/commentaires/frmCommentaire.php";
			}else{
				echo "image introuvable";
			}
		}else{
			$this -> result = "Erreur de connexion";
		}
	}

}