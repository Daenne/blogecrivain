<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--<link rel="stylesheet" href="../Web/css/style.css" />-->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vf59xyjgxn48ibyemdd9z3bljo7vnd99c667lokvdam3ykfi"></script>
    <title>Administration</title>
  </head>
  <body>
    <h1>Interface utilisateur</h1>
    <a href="index.php?action=endAdmin"><button>Déconnexion</button></a>
    <div class="articleAdmin">
      <h2>Gestionnaire des articles</h2>
		  <a href="index.php?action=adminComment"><li>Gérer les commentaires</li></a>


      
      <script>tinymce.init({ selector:'textarea', fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt', bold: {inline : 'span', 'classes' : 'bold'},
        italic: {inline : 'span', 'classes' : 'italic'}});</script>
      

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
          <div class="post">
              <h3>
                <?= strip_tags($article['title']); ?>
              </h3>
              <p>Posté le <?= $article['date_create']; ?>
              <a href="index.php?action=article&id=<?= $article['id']; ?>">Lire la suite</a>
              <a href="index.php?action=updateArticle&id=<?= $article['id']; ?>"><button>Modifier</button></a>
              <a href="index.php?action=deleteArticle&id=<?= $article['id']; ?>"><button>Supprimer</button></a>
          </div>

    <?php
    }
    ?>
    </div>
</body>
</html>

