<?php

include_once 'bao.class.php';

class view extends BoiteOutils{

	static function index(){
		include_once 'views/index.php';
	}
	static function compte(){
		include_once 'views/compte.php';
	}
	static function search($array){
		include_once 'views/search.php';
	}


}

