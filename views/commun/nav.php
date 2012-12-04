<?php
	if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] ==1){
		echo "<span id='connect'>Vous êtes connecté : ".$_SESSION['UserInfo']['login']."</span>";
	}
?>
<nav>
	<ul>
		<li><a href="<?php echo $_SERVER['HTTP_ROOT']; ?>">Accueil</a></li>
		<?php if(!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] != 1): ?>
			<li><a href="<?php echo $_SERVER['HTTP_ROOT']; ?>utilisateur/inscription/">Inscription</a></li>
		<?php endif; ?>
		
		<?php if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] == 1) : ?>
			<li><a href="<?php echo $_SERVER['HTTP_ROOT']; ?>utilisateur/deco/">Déco</a></li>
		<?php endif; ?>

		<?php if(!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] != 1) : ?>
			<li><a href="<?php echo $_SERVER['HTTP_ROOT']; ?>utilisateur/login/">Login</a></li>
		<?php endif; ?>
		
		<?php if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] == 1) : ?>
			<li><a href="<?php echo $_SERVER['HTTP_ROOT']; ?>view/compte/">Compte</a></li>
		<?php endif; ?>
	</ul>
</nav>