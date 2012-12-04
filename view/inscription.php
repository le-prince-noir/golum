<?php 
    if(isset($_POST["frmInscription"])){

    	// Condition de base
		$login = (isset($_POST['login'])) ? $_POST['login'] : "";
		$email = (isset($_POST['email'])) ? $_POST['email'] : "";
		$mdp   = (isset($_POST['mdp']))   ? $_POST['mdp']   : "";

		$erreur = array();

		// Gestion des erreurs
		if($login =="") array_push($erreur, "Veuillez saisir un login");
		if($email =="") array_push($erreur, "Veuillez saisir un email");
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) array_push($erreur, "Email non valide");
		if($mdp=="") array_push($erreur, "Veuillez saisir un mot de passe");

		// Gestion d'affichage des erreurs
		if(count($erreur) > 0){
			$messageErreur ="<h2>Merci de corriger vos erreur</h2>";
			$messageErreur .='<ul>';

			for ($i=0; $i< count($erreur); $i++){
				$messageErreur .= "<li>";
				$messageErreur .= $erreur[$i];
				$messageErreur .= "</li>";
			}

			$messageErreur .="</ul>";
			echo $messageErreur;
			include_once '../view/frmInscription.php';

		}
		else{
			include_once '../class/utilisateur.class.php';
			$connexion= new utilisateur();
			$connexion -> inscription();
		}

	}
	else {
		$mail="";
		include_once '../view/frmInscription.php';
	}