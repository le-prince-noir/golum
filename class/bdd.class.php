<?php
/*
 __set

 __get


MVC

C => intercepte l'url
M => les fonctions a éxécuter et a renvoyer au C
V => affichage est renvoyé au C





*/
abstract class Bdd{
	private $url = "localhost";
	private $login = "root";
	private $mdp = "root";
	private $base = "projet-503";

	public function __construct(){

			try {
				include_once 'log.php';
				$connexion = new PDO("mysql:dbname=".$this -> base.";".$this -> url, $this -> login, $this -> mdp);
			} catch (Exception $e) {
				log::add($e);
				exit('erreur');
			}

		// public function __set($obj, $val){
		// 	$this -> $obj = $val;
		// }
		if($connexion){
			return $connexion;
		}
		else{
			return false;
		}
	}

	public function __destruct(){
		// $connexion = NULL;
	}

}