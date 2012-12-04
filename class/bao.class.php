<?php
include_once 'bdd.class.php';
class BoiteOutils extends Bdd{


	public function session_Log($array){

		$_SESSION["is_logged"]=1;
		$Log = "deco";
		$_SESSION['UserInfo'] = $array;

		include_once 'views/compte.php';
	}

	public function donneeBdd($id){
		// on récupère la connexion
		$bd = parent::__construct();
		$donnee = $bd -> prepare("SELECT * FROM utilisateur WHERE id_UTILISATEUR = :id");
		$donnee -> bindParam(":id", $id);
		$donnee -> execute();

		$donnerUser = $donnee -> fetch(PDO::FETCH_ASSOC);

		$this -> session_Log($donnerUser);
	}

####################################################
############### Méthode de hashage #################
####################################################

	public static function hashsha512($sha512){
		$sha512 = str_split($sha512); // transforme un string en tableau
		$alphabetNum = array('A' => 'g','B' => 'Q','C' => '0','D' => 'p','E' => 'b','F' => '9','G' => 'n','H' => 'A','I' => 'i','J' => 'k',
				   			 'K' => '1','L' => 'w','M' => 'q','N' => '2','O' => 'L','P' => 'D','Q' => 'V','R' => '5','S' => 'z','T' => 'o',
				   			 'U' => 'd','V' => 'a','W' => 't','X' => 's','Y' => 'h','Z' => '3','a' => '4','b' => 'T','c' => 'c','d' => 'Z',
				   			 'e' => 'E','f' => 'H','g' => '8','h' => 'C','i' => 'e','j' => 'J','k' => 'r','l' => 'l','m' => 'Y','n' => '7',
				   			 'o' => 'O','p' => '6','q' => 'j','r' => 'X','s' => 'U','t' => 'v','u' => 'P','v' => 'W','w' => 'R','x' => 'x',
				   			 'y' => 'y','z' => 'B',0 => 'G',1 => 'N',2 => 'I',3 => 'm',4 => 'F',5 => 'f',6 => 'K',7 => 'M',8 => 'u',9 => 'S');
		$string = "";

		for ($i=0; $i < count($sha512); $i++) {
			if(in_array($sha512[$i], $alphabetNum)){
				$string .= $alphabetNum[$sha512[$i]];
			}else{
				$string .= $sha512[$i];
			}
		}

		$sha512 = hash('sha512', $string);

		return $sha512 = "_".$sha512."_";

	}
}