<?php
  $title="Inscription";
  require_once "./include/functions.inc.php";
  require "./include/header.inc.php";
?>
<div class="center">
	
    <h1>Inscription</h1>
	<form method="POST" action="registration.php">
		
        <div class="text_field">
			<input type="text" name="pseudo" required="required">
			<label>Identifiant</label>
		</div>

        <div class="text_field">
			<input type="email" name="email" required="required">
			<label>E-Mail</label>
		</div>
		
        <div class="text_field">
			<input type="password" name="pass" required="required">
			<label>Mot de passe</label>
		</div>

        <div class="text_field">
			<input type="password" name="pass-retype" required="required">
			<label>Confirmation mot de passe</label>
		</div>
		
        <div class="pass">Mot de passe oublié ?</div>
		
        <input type="submit" value="S'inscrire" id="login-btn">
		<div class="signup_link">
			Déjà inscrit ? <a href="./connexion.php">Se connecter ici</a>
		</div>
	</form>
</div>

<?php
  require "./include/footer.inc.php";
?>