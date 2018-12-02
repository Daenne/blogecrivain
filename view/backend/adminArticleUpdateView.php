<?php include('./view/template/header.php'); ?>
    <?php include('./view/template/headerAdmin.php'); ?>
  	<section class="updateArticle">
  		<h2>Modifier l'article : </h2>
	    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vf59xyjgxn48ibyemdd9z3bljo7vnd99c667lokvdam3ykfi"></script>
		  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
  		<script>tinymce.init({ selector:'textarea' });</script>

		<form action ="index.php?action=writeArticle&amp;id=<?= strip_tags($initialArticle['id']); ?>" method="post">

      	<input type="text" name="title" placeholder="Titre" value="<?= strip_tags($initialArticle['title']) ?>" /><br />

      	<textarea name="content" name="content" id="content" placeholder="Contenu de l'article"><?= nl2br(strip_tags($initialArticle['content'])); ?></textarea>

      	<input type="submit" value="Modifier l'article" />
		</form>
  	</section>
  	<?php include('./view/template/footer.php'); ?> 

