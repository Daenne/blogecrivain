<h1>Interface utilisateur</h1>
<nav>
	<ul>
		<li>Ajouter</li>
		<li>Modifier</li>
		<li>Supprimer</li>
	</ul>
</nav>

<form action="index.php?action=addArticle" method ="post">
        <p>
          <label for="title">Titre : </label>
        </p>
          <input type="textarea" name="title" id="title" />
        <p>
          <label for="content">Article : </label>
        </p>
          <textarea name="content" id="content"></textarea>
        <p>
          <button type="submit" name="addArticle">Ajouter</button>
        </p>
      </form>



