<?php 
        if(isset($_POST["frmLogin"])){
			$login = (isset($_POST['login'])) ? $_POST['login'] : "";
			$mdp= (isset($_POST['mdp'])) ? $_POST['mdp'] : "";

			$erreur = array();

			if($login =="") array_push($erreur, "Veuillez saisir votre email");
			if($mdp=="") array_push($erreur, "Veuillez saisir votre mot de passe");

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
				include_once '../includes/frmLogin.php';

			}
			else{
				include_once '../class/utilisateur.class.php';
				$connexion= new utilisateur();
				$connexion -> login();
			}
		}
		else {
			$mail="";
			include_once './frmLogin.php';
		}
