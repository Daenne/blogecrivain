<?php 
include('./view/template/header.php');
include('./view/template/headerAdmin.php'); 
?>
<section class="section">
  <div class="container">

  	<h2 class="title is-2">Modifier l'article : </h2>

      <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vf59xyjgxn48ibyemdd9z3bljo7vnd99c667lokvdam3ykfi"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>

		<form action ="index.php?action=writeArticle&amp;id=<?= strip_tags($initialArticle['id']); ?>" method="post">
      <div class="field">
          <div class="control">
              <input class="input is-link" name="title" type="text" value="<?= strip_tags($initialArticle['title']) ?>"><br />
          </div>
      </div>
      <div class="field">
        <div class="control">
          <textarea class="textarea" name="content"><?= nl2br(strip_tags($initialArticle['content'])); ?></textarea>
        </div>  
      </div>
      <button class="button is-link" type="submit">Modifier</button>
		</form>
  </div>
</section>
<?php include('./view/template/footer.php'); ?> 

