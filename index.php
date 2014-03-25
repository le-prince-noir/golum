<?php
	session_start();
	$timestart=microtime(true);
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>La POO pour les nuls</title>
	  	<link href="<?php echo $_SERVER['HTTP_ROOT']; ?>/public/css/reset.css" rel="stylesheet" >
        <link href="<?php echo $_SERVER['HTTP_ROOT']; ?>/public/css/style.css" rel="stylesheet" >
	</head>
<script>
	console.log('variable');
</script>
	<body>
		<div id="wrapper">

<?php
include_once 'controller/controller.class.php';

include_once 'class/bao.class.php';

?>
</div>
<div id="footer">
<?php
$timeend=microtime(true);
$time=$timeend-$timestart;
$page_load_time = number_format($time, 3);
echo "Debut du script: ".date("H:i:s", $timestart);
echo "<br>Fin du script: ".date("H:i:s", $timeend);
echo "<br>Script execute en " . $page_load_time . " sec";
 ?>
	</div>
</body>
</html>