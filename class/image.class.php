<?php

include_once 'bao.class.php';

class image extends BoiteOutils{

	private $erreurs = array();
	private $tabForm = array();
	private $messageErreur;
	private $result;

	public function verification($valeurs){

		if($_POST['nom'] == ""){
			echo "Veuillez saisir un nom d'image";
		}
		if($_POST['description'] == ""){
			echo "Veuillez saisir une description";
		}
	}


	public function ajout(){

		if (isset($_POST['frmInscription'])){
                    include_once 'views/commun/nav.php';
                    if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){
                        // on récupère la connexion
			$bd = parent::__construct();

                        if($_POST['titreImg'] !=""){
                            // Testons si le fichier n'est pas trop gros
                            if ($_FILES['monfichier']['size'] <= 1000000)
                            {
                                // Testons si l'extension est autorisée
                                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                                $extension_upload = $infosfichier['extension'];
                                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

                                if (in_array($extension_upload, $extensions_autorisees))
                                {
                                // On peut valider le fichier et le stocker définitivement
                                $infosfichier = $_SESSION['UserInfo']['login'].'-'.time().'.'.$extension_upload;
                                move_uploaded_file($_FILES['monfichier']['tmp_name'], "images_users/".$_SESSION['UserInfo']['login']."/".basename($infosfichier));

                                //Requète d'insertion en base de donnée
                                $date = new DateTime();
                                $dateCrea= $date->format('Y-m-d H:i:s');
                                $sql="INSERT INTO images (date_ajout, date_modif, URL, Nom, Description, UTILISATEUR_id_UTILISATEUR)
                                    VALUES (:date_ajout, :date_ajout, :url, :nom, :description, :utilisateur)";
                                $requete=$bd->prepare($sql);
                                $requete->bindParam(':date_ajout', $dateCrea);
                                $requete->bindParam(':url', $_SESSION['UserInfo']['login']);
                                $requete->bindParam(':nom', $infosfichier);
                                $requete->bindParam(':description', $_POST['descImg']);
                                $requete->bindParam(':utilisateur', $_SESSION['UserInfo']['id_UTILISATEUR']);
                                $requete->execute();


                                echo "L'envoi a bien été effectué !";
                                }
                                else{
                                    echo "L'extension du fichier n'est pas authorisée";
                                    include_once 'views/user/frmImage.php';
                                }
                            }

                            else{
                                echo "Le fichier est trop gros";
                                include_once 'views/user/frmImage.php';
                            }
                        }
                        else{
                            echo "Veuillez entrer un titre pour l'image";
                            include_once 'views/user/frmImage.php';
                        }
                    }
                    else{
                        echo "Veuillez sélectionner une image ";
                        include_once 'views/user/frmImage.php';
                    }

		}

		else{
                    include_once 'views/user/frmImage.php';
		}
	}


	public function suppression(){

		//if isset($_POST['id_images']){
			//$id_images = $_POST['id_images']);

			//$sql = " DELETE FROM images WHERE id_images = ".$id_images." ";
		//}
		//else{
			//echo "erreur";
		//}

	}
}