<?php
if(isset($_GET['page'])){
	$url = explode("/", $_GET['page']);
}else{
	$url[0] = 'view';
	$url[1] = 'index';
}

$controller = ($url[0] != "") ? $url[0] : 'view';
$action = isset($url[1]) ? $url[1] : 'index';

include_once 'class/' . $controller . '.class.php';
$controller = new $controller();

if(isset($url[2])){
	$controller -> $action($url[2]);
}else{
	$controller -> $action();
}
