<?php include('./view/template/header.php'); ?>
<section class="section">
  <div class="container">
  		<h2 class="title is-2">Espace administrateur</h2>
    	<p class="subtitle is-5">Veuillez entrer le mot de passe pour accéder à l'interface d'administration : </p>
    	<form action="index.php?action=login" method="post">
        <div class="field is-horizontal">
          <label class="label">Identifiant : </label>
          <div class="control">
            <input class="input" type="text" name="pseudo" placeholder="Votre pseudo">
          </div>
        </div>
        <div class="field is-horizontal">
          <label class="label">Mot de passe : </label>
          <div class="control">
            <input class="input" type="password" name="password" placeholder="Votre mot de passe">
          </div>
        </div>
        <div class="field is-horizontal">
          <!--<label class="label">Identifiant :</label>-->
          <div class="control">
            <input class="input" type="submit" name="addAdminConnexion" value="Valider">
          </div>
        </div>
        	<!--<input type="text" placeholder="Votre pseudo" name="pseudo" />
        	<input type="password" placeholder="Votre mot de passe" name="password" />
        	<input type="submit" name="addAdminConnexion" value="Valider" />-->
    
    	</form>
      <br/>
    	<p>Cette page est réservée à l'administration du blog</p>
    </div>
  	</section>  
<?php include('./view/template/footer.php'); ?>  
