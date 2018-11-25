<h1>Interface utilisateur</h1>

<h2>Gestionnaire des articles</h2>
<nav>
	<ul>
		<a href="index.php?action=adminComment"><li>Gérer les commentaires</li></a>
	</ul>
</nav>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
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
                <a href="index.php?action=updateArticle&id=<?= $article['id']; ?>"><button>Modifier</button></a>
                <a href="index.php?action=deleteArticle&id=<?= $article['id']; ?>"><button>Supprimer</button></a>

            </div>
        </article>

    <?php
    }
    ?>



