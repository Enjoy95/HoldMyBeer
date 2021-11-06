<?php
  $title="Connexion";
  require_once "./include/functions.inc.php";
  require "./include/header.inc.php"; 
?>
<div class="center">
	
  <h1>Connexion</h1>
	
  <form method="POST" action="login.php">
		
    <div class="text_field">
			<input type="text" name="pseudo" required="required">
			<label>Identifiant</label>
		</div>
		
    <div class="text_field">
			<input type="password" name="pass" required="required">
			<label>Mot de passe</label>
		</div>
		
    <div class="pass">Mot de passe oublié ?
      <a href="#"></a>
    </div>
		
    <input type="submit" name="submit "value="Se connecter" id="login-btn"/>
		
    <div class="signup_link">
			Pas encore inscrit ? <a href="./inscription.php">S'incrire ici</a>
		</div>
	</form>
</div>

<?php
  require "./include/footer.inc.php";
?>