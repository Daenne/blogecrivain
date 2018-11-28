<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="../Web/css/style.css" />
    <title>Authentification</title>
  </head>
  <body>
  		<?php include('/template/header.php'); ?>
      <section class="authentification">
  		<h2>Espace administrateur</h2>
    	<p>Veuillez entrer le mot de passe pour accéder à l'interface d'administration</p>
    	<form action="index.php?action=login" method="post">
    
        	<input type="text" placeholder="Votre pseudo" name="pseudo" />
        	<input type="password" placeholder="Votre mot de passe" name="password" />
        	<input type="submit" name="addAdminConnexion" value="Valider" />
    
    	</form>
    	<p>Cette page est réservée à l'administration du blog</p>
  	</section>  
    <?php include('/template/footer.php'); ?>
  </body>
</html>
