<?php include('./template/header.php'); ?>

    <p>Veuillez entrer le mot de passe pour accéder à l'interface d'administration</p>
    <form action="./adminView.php" method="post">
    
        <input type="text" placeholder="Votre pseudo" name="pseudo" />
        <input type="password" placeholder="Votre mot de passe" name="password" />
        <input type="submit" value="Valider" />
    
    </form>
    <p>Cette page est réservée à l'administration du blog</p>

<?php include('./template/footer.php'); ?>