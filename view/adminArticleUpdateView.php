<article>
	<form action ="index.php?action=writeArticle&amp;id=<?= $initialArticle['id']; ?>" method="post">

      <input type="text" name="title" placeholder="Titre" value="<?= $initialArticle['title'] ?>" /><br />

      <input type="textarea" name="content" placeholder="Contenu de l'article" value="<?= $initialArticle['content'] ?>"  /></input><br />

      <input type="submit" value="Modifier l'article" />
	</form>
</article>