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



    <?php

    while ($article = $articlesList->fetch()) { ?>
        <article>
            <div>
                <h3>
                    <?=$article['title']?>
                </h3>
                <p>Posté le <?= $article['date_create']; ?>
                <a href="index.php?action=article&id=<?= $article['id']; ?>">Lire la suite</a>
                <form action="index.php?"><button type="submit" name="updateArticle">Modifier</button></form>
                <a href="index.php?action=deleteArticle&id=<?= $article['id']; ?>"><button>Supprimer</button></a>

            </div>
        </article>

    <?php
    }
    ?>



