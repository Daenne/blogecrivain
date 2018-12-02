<?php include('./view/template/header.php'); ?>
    <?php include('./view/template/headerAdmin.php'); ?>

        <?php
        while ($comment = $comments->fetch()){
        ?>
        <table>
            <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Statut</th>
                </tr>
            </thead>

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
                    <td><a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>"><button>Supprimer</button></a></td>
                </tr>
            </tbody>
        </table>    
        <?php
        }
        ?>
    </div>
    <?php include('./view/template/footer.php'); ?> 
