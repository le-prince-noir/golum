<?php

include_once 'bao.class.php';

class utilisateur extends BoiteOutils{

	private $erreurs = array();
	private $tabForm = array();
	private $messageErreur;
	private $result;




public function verification($valeurs){

		// création d'un tableau de toutes les valeurs de $_POST
		foreach ($valeurs as $key => $value) {
			// appel la méthode de hashage du mdp
			if($key == "password" && $value != ""){
				$value = $this -> hashsha512($value);
			}

			$this -> tabForm[$key] =  $value;
			// si une valeur est vide, on ajoute le msg d'erreur correspondant
			if($value == "") {
				$this -> erreurs[$key] = "Veuillez saisir le champ : ".$key;
			}
			if($key == "email" && $value != "" && !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$valeurs[$key])){
				$this -> erreurs[$key] = "Veuillez saisir une adresse mail valide";
			}

		}
			unset(
				$this -> tabForm['frmInscription'],
				$this -> erreurs['frmInscription'],
				$this -> tabForm['frmLogin'],
				$this -> erreurs['frmLogin']


				);

		// on vérifie s'il y a des erreurs
		if(count($this -> erreurs)>0){
			$this -> messageErreur = "<h2>Merci de corriger vos erreurs</h2>";
			$this -> messageErreur .= "<ul id='erreurs'>";

			// pour chaque erreur, on l'ajoute dans la variable

			foreach ($this -> erreurs as $key => $value) {
				$this -> messageErreur .= "<li>".$value."</li>";
			}

			$this -> messageErreur .= "</ul>";

			return $this -> messageErreur;
		}else{
			return $this -> tabForm;
		}

	}

public function login(){

	if($_POST){
		$tablo = $this -> verification($_POST);
		if($this -> messageErreur == ""){
			// on récupère la connexion
			$bd = parent::__construct();
			if($bd){
				// vérification du mail + du mdp pour vérifier si l'utisateur est déjà connu dans la bdd
				$verif_user = $bd -> prepare("SELECT * FROM utilisateur WHERE email=:email && password=:password");
				$verif_user -> bindParam(":email", $tablo['email']);
				$verif_user -> bindParam(":password", $tablo['password']);
				$verif_user -> execute();

				$nb = $verif_user -> rowCount();

				// si la variable nb est supp à 0 c'est que l'utilisateur est dans la bdd, donc c'est un membre
				if($nb > 0){
					$user = $verif_user -> fetch(PDO::FETCH_ASSOC);
					$this -> session_Log($user);
				}else{
				// ici l'utilisateur n'est pas un membre, donc on inclu denouveau le formulaire
					include_once 'view/user/frmLogin.php';
					$this -> result = "Pas membres";
				}
			}else{
				$this -> result = "Erreur de connexion";
			}

			//var_dump($this -> result);
			return $this -> result;
		}else{
				include_once 'view/user/frmLogin.php';
				echo $tablo;
		}
		}else{
			$_POST['login'] = $_POST['email'] = "";
			include_once 'view/user/frmLogin.php';
		}

	}

public function inscription(){

		if($_POST){
			$tablo = $this -> verification($_POST);
			if($this -> messageErreur == ""){

			$bd = parent::__construct();
			if($bd){
				// on vérifie que le mail n'est pas déjà dans la base de donnée
				$verif_user = $bd -> prepare("SELECT * FROM utilisateur WHERE email=:email");
				$verif_user -> bindParam(":email", $tablo['email']);
				$verif_user -> execute();

				$nb = $verif_user -> rowCount();

				// si la variable nb est supp à 0 alors c'est que le mail est déjà dans la bdd
				if($nb > 0){
					include_once 'view/user/frmInscription.php';
					echo $this -> result = "Mail deja utiliser";
				}else{
				// ici on insérère le nouveau membre
					$path = "images_users/".$tablo['login'];

					mkdir($path);

					$date = new DateTime();

					$tablo['date_creation'] = $date->format('Y-m-d H:i:s');

					$sql ="INSERT INTO utilisateur (login,password,email,role,date_creation)
		                VALUES (:login, :password, :email,:role,:date_creation);";

					$ajout = $bd -> prepare($sql);

					// utilisation d'un foreach pour inséré automatiquement tout les paramètres
					foreach ($tablo as $key => $value) {
						$ajout -> bindParam($key, $tablo[$key]);
					}

					$ajout -> execute();

					$tab = array('email' => $tablo['email'] , 'password' => $tablo['password']);

					$info = $this -> login($tab);
				}
			}else{
				$this -> result = "Erreur de connexion";
			}

			//var_dump($this -> result);
			return $this -> result;
			}else{
				include_once 'view/user/frmInscription.php';
				echo $tablo;
			}
		}else{
			$_POST['login'] = $_POST['password'] = $_POST['email'] = "";
			include_once 'view/user/frmInscription.php';
		}
	}


// public function modification(){
// 	$tablo = $this -> verification($_POST);
// 		$bd = parent::__construct();
// 		if($bd){

// 		    $sql = "UPDATE utilisateur SET login =:login,";

// 		    if(isset($tablo['password'])){
// 		    	 $sql .= " password = :password,";
// 		    }

// 	    	$sql .= " email = :email, role = :role WHERE id_UTILISATEUR = :id";

// 	    	$modif = $bd -> prepare($sql);

// 			foreach ($tablo as $key => $value) {
// 				$value = ($value == $tablo['id']) ? (int) $value : $value;
// 				$modif -> bindParam($key, $tablo[$key]);
// 			}
// 			$modif -> execute();
// 			$this -> donneeBdd($tablo['id']);
// 			//$this -> result = "victoire Modification success";
//         }else{
// 			$this -> result = "Erreur de connexion";
// 		}
// 		return $this -> result;
// 	}



	public function deco(){
		session_destroy();
		header('Location: '.WEBROOT);
	}


}