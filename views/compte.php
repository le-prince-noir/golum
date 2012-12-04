<?php 
include_once 'commun/nav.php';

?>

<ul>
	<?php 
foreach ($_SESSION['UserInfo'] as $key => $value) : ?>
	<li> <?php echo $key." : ".$value  ?></li>

<?php endforeach; ?>
</ul>
<a href="<?php echo $_SERVER['HTTP_ROOT']; ?>utilisateur/modification/">Modification</a>
<a href="<?php echo $_SERVER['HTTP_ROOT']; ?>image/ajout/">Ajouter une image</a>