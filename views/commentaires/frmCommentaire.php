<?php include_once 'views/commun/nav.php'; ?>
<h1>Commentaires</h1>
<form id="login" method="POST" action="<?php echo $_SERVER['HTTP_ROOT']; ?>commentaire/login/">

	<p>
		<input type="hidden" name="utilisateur" value="<?php echo $_SESSION['UserInfo']["login"]; ?>" />
	</p>
	<p>
		<label for="text">Votre commentaire : </label>
		<textarea></textarea>
	</p>
	<p>
		<input type="submit" value="Envoyer" id="connexion" />
	</p>
	<p>
		<input type="hidden" name="frmCommentaire" />
	</p>
</form>