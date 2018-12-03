<?php 
include('./view/template/header.php'); 
include('./view/template/headerAdmin.php'); 
?>
<section class="section">
  <div class="container">
    <?php
        while ($comment = $comments->fetch()){?>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <strong><?= strip_tags($comment['author']) ?></strong>
            </p>
        </header>
        <div class="card-content">
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
                        echo "Signalé";
                    }
                    ?>
                  </p><br/>
                  <a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>"><button class="button is-danger">Supprimer</button></a> 
                </div>
        <?php
        }
        ?>
    </div>
        <!--<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            

            <tbody>

                <tr>
                                            
        
                    <td><strong><?= strip_tags($comment['author']) ?></strong></td>
                    <td>le <?= $comment['date_create'] ?></td>
                    <td><?= nl2br(strip_tags($comment['content'])) ?></td>
                    <td>
                    <?php
                    if ($comment['warning'] == 0) {
                        echo "";
                    }
                    else {
                        echo "Signalé";
                    }
                    ?>
                    </td>
                    <td><a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>"><button class="button is-danger">Supprimer</button></a></td>
                </tr>
            </tbody>
        </table>   --> 

</div>
</section>
<?php include('./view/template/footer.php'); ?> 
