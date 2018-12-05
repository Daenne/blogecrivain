<?php 
include('./view/template/header.php'); 
include('./view/template/headerAdmin.php'); 
?>
<section class="section">
  <div class="container">  
    <div class="card box">
        <?php
        while ($comment = $comments->fetch()){
        ?>
        <header class="card-header">
            <p class="card-header-title">
                <strong><?= strip_tags($comment['author']) ?></strong>
            </p>
        </header>
        <div class="card-content box">
            <div class="content">
                <?= nl2br(strip_tags($comment['content'])); ?>
                <br>
                le <?= $comment['date_create']; ?>
            </div>
                <p class="is-warning">
                <?php
                    if ($comment['warning'] == 0) {
                        echo "";
                    }
                    else {
                        echo "<strong>Signalé</strong>";
                    }
                ?>
                </p><br/>
                <a class="button is-success" href="index.php?action=validComment&amp;id=<?= $comment['id']; ?>">Valider</a>
                <a class="button is-danger" href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>">Supprimer</a> 
        </div>
        <?php
        }
        ?>
    </div>
  </div>
</section>
<?php include('./view/template/footer.php'); ?> 
