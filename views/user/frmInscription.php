<?php
include_once 'views/commun/nav.php';

?>
<h1>Inscription</h1>

<form id="inscription" method="POST" action="<?php echo $_SERVER['HTTP_ROOT']; ?>utilisateur/inscription/">
	<p>
		<label for="login">Nom : </label>
		<input type="text" name="login" id="login" value="<?php echo $_POST['login']; ?>" />
	</p>
	<p>
		<label for="email">E-mail : </label>
		<input type="email" name="email" id="email" value="<?php echo $_POST['email']; ?>" placeholder="samy-kantari@cifacom.com"/>
	</p>
	<p>
		<label for="password">Mot de passe : </label>
		<input type="password" name="password" id="password" />
	</p>
	<p>
		<label for="password1">Confirmer mot de passe : </label>
		<input type="password" name="password1" id="password1" />
	</p>
	<p class="role">

		<label for="role">role : </label>
		<select name="role" id="role">
			<option value="1">membre</option>
			<option value="0">admin</option>
		</select>
	</p>
	<p>
		<input type="submit" value="Envoyer" id="envoyer" />
	</p>
	<p>
		<input type="hidden" name="frmInscription" />
	</p>
</form>