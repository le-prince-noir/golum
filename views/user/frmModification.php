<?php
if(!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] != 1){
	header('Location: '.$_SERVER['HTTP_ROOT'].'/views/user/frmLogin/');
}
include_once 'views/commun/nav.php';
 ?>
<section id="membre">
	<h1>Vous êtes connecté : <?php echo $_SESSION['UserInfo']['login']; ?></h1>
	<div id="infoMembre">
		<form id="modification" method="POST" action="<?php echo $_SERVER['HTTP_ROOT']; ?>utilisateur/modification/">
			<p>
				<label for="password">Mot de passe : </label>
				<input type="password" name="password" id="password" />
			</p>
			<p>
				<label for="email">Email : </label>
				<input type="mail" name="email" id="email" value="<?php echo $_SESSION['UserInfo']['email']; ?>" />
			</p>
			<p class="role">
				<?php
					$selectA = ($_SESSION['UserInfo']['role'] == '0') ? "selected='selected'" : "";
					$selectM = ($_SESSION['UserInfo']['role'] == '1') ? "selected='selected'" : "";
				 ?>
				<label for="role">role : </label>
				<select name="role" id="role">
					<option value="1" <?php echo $selectM; ?>>membre</option>
					<option value="0" <?php echo $selectA; ?>>admin</option>
				</select>
			</p>
			<p>
				<input type="submit" value="Modification" id="envoyer" />
			</p>
			<p>
				<input type="hidden" name="id" value="<?php echo $_SESSION['UserInfo']['id_UTILISATEUR']; ?>" />
				<input type="hidden" name="frmModification" />
			</p>
		</form>
	</div>
</section>