<?php 
include_once 'views/commun/nav.php';

	for ($i=0; $i < count($array) ; $i++) {
		foreach ($array[$i] as $key => $value) :
		if($key == 'URL'){
			$url = $value;
		}
		if($key == 'Nom'){
			$name = $value;
		}
		 ?>
<?php endforeach; ?>
		<img src="<?php echo $_SERVER['HTTP_ROOT']."images_users/".$url."/".$name; ?>" alt="" width="300">
		<?php }; ?>