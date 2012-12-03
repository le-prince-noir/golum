<?php
	if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] ==1){
		echo "<span id='connect'>Vous êtes connecté : ".$_SESSION['UserInfo']['login']."</span>";
	}
?>
<nav>
	<ul>
		<li><a href="<?php echo WEBROOT; ?>">Accueil</a></li>
		<?php if(!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !=1){
			echo '<li><a href="'.WEBROOT.'utilisateur/inscription/">Inscription</a></li>';
		}
		?>
		<li>
			<?php if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] ==1) : ?>
				<a href=<?php echo WEBROOT."utilisateur/deco/"; ?>>Déco</a>
			<?php endif; ?>

			<?php if(!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] !=1) : ?>
				<a href=<?php echo WEBROOT."utilisateur/login/"; ?>>Login</a>
			<?php endif; ?>
		</li>
		<?php
			if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] ==1){
				echo '<li><a href="'.WEBROOT.'view/compte/">Membre</a></li>';
			}
		 ?>
	</ul>
</nav>