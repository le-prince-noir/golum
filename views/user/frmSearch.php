<?php
if(!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] != 1){
	header('Location: '.$_SERVER['HTTP_ROOT'].'/views/user/frmLogin/');
}
include_once 'views/commun/nav.php';
 ?>
<section id="membre">
	<div id="infoMembre">
		<form id="modification" method="POST" action="<?php echo $_SERVER['HTTP_ROOT']; ?>search/recherche/">
			<p>
				<label for="search">Recherche : </label>
				<input type="text" name="search" id="search" />
			</p>
			<p>
				<input type="submit" value="Recher" id="envoyer" />
			</p>
			<p>
				<input type="hidden" name="frmSearch" />
			</p>
		</form>
	</div>
</section>