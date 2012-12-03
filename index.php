<?php session_start();


$define = "projet03/";

define('WEBROOT',"http://localhost/".$define);
define('URL_CSS', WEBROOT."public/css/");
define('URL_IMG', WEBROOT."public/img/");
define('URL_JS', WEBROOT."public/js/");

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>La POO pour les nuls</title>
	  	<link href="<?php echo URL_CSS; ?>reset.css" rel="stylesheet" >
        <link href="<?php echo URL_CSS; ?>style.css" rel="stylesheet" >
	</head>

	<body>
		<div id="wrapper">

<?php
include_once 'controller/controller.class.php';

include_once 'class/bao.class.php';



?>
</div>
</body>
</html>