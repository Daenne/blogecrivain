<article>
	<!---<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vf59xyjgxn48ibyemdd9z3bljo7vnd99c667lokvdam3ykfi"></script>-->
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>

	<form action ="index.php?action=writeArticle&amp;id=<?= $initialArticle['id']; ?>" method="post">

      <input type="text" name="title" placeholder="Titre" value="<?= $initialArticle['title'] ?>" /><br />

      <textarea name="content" name="content" id="content" placeholder="Contenu de l'article"><?= $initialArticle['content'] ?></textarea>

      <input type="submit" value="Modifier l'article" />
	</form>
</article>