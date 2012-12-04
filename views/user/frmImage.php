<?php
if(!isset($_SESSION["is_logged"]) || $_SESSION["is_logged"] != 1){
	header('Location: '.$_SERVER['HTTP_ROOT'].'/views/user/frmLogin/');
}
include_once 'views/commun/nav.php';
 ?>
<section id="membre">
    <form action="<?php echo $_SERVER['HTTP_ROOT']; ?>image/ajout/" method="POST" enctype="multipart/form-data">
        <p>
            Formulaire d'envoi de fichier :<br />
            <input type="file" name="monfichier" /><br /> <br />
            <label for="titreImg">Titre de l'image :</label>
            <input type="text" name="titreImg" id="titreImg" /><br />
            <label for="descImg">Description de l'image (peut être vide): </label>
            <textarea row="6" col="3" id="descImg" name="descImg"></textarea>
            <input type="hidden" name="frmInscription" /><br />
            <input type="submit" value="Envoyer le fichier" />
        </p>
    </form>
    
    
</section>
