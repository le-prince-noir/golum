<?php
if(!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] != 1){
	header('Location: '.WEBROOT.'login/')
}

	$naissance = new Naissance();
	$anniv = explode('-', $_SESSION['UserInfo']['utidatenaissance']);


 ?>
<section id="membre">
	<h1>Vous êtes connecté : <?php echo $_SESSION['UserInfo']['utinom']." ".$_SESSION['UserInfo']['utiprenom']; ?></h1>
	<div id="infoMembre">
		<form id="modification" method="POST" action="<?php echo WEBROOT; ?>modification/">
			<p>
				<label for="nom">Nom : </label>
				<input type="text" name="nom" id="nom" value="<?php echo $_SESSION['UserInfo']['utinom']; ?>" />
			</p>
			<p>
				<label for="prenom">Prenom : </label>
				<input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['UserInfo']['utiprenom']; ?>" />
			</p>
			<p>
				<label for="tel">Tel : </label>
				<input type="text" name="tel" id="tel" value="<?php echo $_SESSION['UserInfo']['utitelephone']; ?>" placeholder="06 82.74-10 64"/>
			</p>
			<p>
				<label for="mdp">Mot de passe : </label>
				<input type="password" name="mdp" id="mdp" />
			</p>
			<?php echo $naissance -> dateNaissance($anniv[2],$anniv[1],$anniv[0]); ?>
			<p class="role">
				<?php
					$selectH = ($_SESSION['UserInfo']['utisexe'] == 'Homme') ? "selected='selected'" : "";
					$selectF = ($_SESSION['UserInfo']['utisexe'] == 'Femme') ? "selected='selected'" : "";
				 ?>
				<label for="sexe">sexe : </label>
				<select name="sexe" id="sexe">
					<option value="Homme" <?php echo $selectH; ?>>Homme</option>
					<option value="Femme" <?php echo $selectF; ?>>Femme</option>
				</select>
				<?php
					$selectA = ($_SESSION['UserInfo']['utirole'] == '0') ? "selected='selected'" : "";
					$selectM = ($_SESSION['UserInfo']['utirole'] == '1') ? "selected='selected'" : "";
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
				<input type="hidden" name="id" value="<?php echo $_SESSION['UserInfo']['id_utilisateur']; ?>" />
				<input type="hidden" name="frmModification" />
			</p>
		</form>
	</div>
</section>