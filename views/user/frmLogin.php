<?php include_once 'views/commun/nav.php'; ?>
<h1>Connexion</h1>
<form id="login" method="POST" action="<?php echo $_SERVER['HTTP_ROOT']; ?>utilisateur/login/">
	<p>
		<label for="email">E-mail : </label>
		<input type="email" name="email" id="email" value="<?php echo $_POST['email']; ?>" placeholder="samy-kantari@cifacom.com"/>
	</p>
	<p>
		<label for="password">Mot de passe : </label>
		<input type="password" name="password" id="password" />
	</p>
	<p>
		<input type="submit" value="Envoyer" id="connexion" />
	</p>
	<p>
		<input type="hidden" name="frmLogin" />
	</p>
</form>