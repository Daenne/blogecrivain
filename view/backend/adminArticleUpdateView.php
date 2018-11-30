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
    <title>Modifier un article</title>
  </head>
  <body>
  	<section class="updateArticle">
  		<h1>Modifier l'article : </h1>
	    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vf59xyjgxn48ibyemdd9z3bljo7vnd99c667lokvdam3ykfi"></script>
		  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
  		<script>tinymce.init({ selector:'textarea' });</script>

		<form action ="index.php?action=writeArticle&amp;id=<?= strip_tags($initialArticle['id']); ?>" method="post">

      	<input type="text" name="title" placeholder="Titre" value="<?= strip_tags($initialArticle['title']) ?>" /><br />

      	<textarea name="content" name="content" id="content" placeholder="Contenu de l'article"><?= nl2br(strip_tags($initialArticle['content'])); ?></textarea>

      	<input type="submit" value="Modifier l'article" />
		</form>
  	</section>
  	
</body>
</html>
