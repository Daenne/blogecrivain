<?php

require_once('./model/Model.php');

class Controller
{
    protected $modelArticle;

    function __construct()
    {
        $this->modelArticle = new Model();
    }

    public function getIndex()
    {
        $articlesList = $this->modelArticle->getArticles();
        require('./view/indexView.php');
    }

    public function getIndexAdmin()
    {
        $articlesList = $this->modelArticle->getArticles();
        require('./view/adminView.php');
    }

    public function getLogin(){ 
        require('./view/loginView.php');
    }

    public function getAdminConnexion ($pseudo, $password) {
        $articlesList = $this->modelArticle->getArticles();
        $result = $this->modelArticle->adminConnexion($pseudo, $password);

        $isPseudoCorrect = strcmp($pseudo, $result['pseudo']);

        $isPasswordCorrect = strcmp($password, $result['password']);

        if (($isPseudoCorrect == 0) AND ($isPasswordCorrect == 0)) {
            session_start();
            $_SESSION['pseudo'] = $pseudo;
            require('./view/adminView.php');
        }
        else {
            throw new Exception('Pseudo et/ou mot de passe incorrect(s)');
        }

        //require
        //$isPseudoCorrect = password_verify($_POST['pseudo'], $result['pseudo']);
        //$isPasswordCorrect = password_verify($_POST['password'], $result['password']);
    }

    //public function idAdmin($pseudo){
    //    $pseudo = $this->modelArticle->getAdminId($pseudo);
    //    $isPseudoCorrect = strcmp($_POST['pseudo'], $pseudo);
    //    return $isPseudoCorrect;
    //}

    //public function passwdAdmin ($password){
    //    $password = $this->modelArticle->getAdminPW($password);
    //    $isPasswordCorrect = password_verify($_POST['password'], $password);
    //    return $isPasswordCorrect;

    //}

    public function getArticles()
    {
        $articlesList = $this->modelArticle->getArticles();
        //$deleteArticle = $this->stopArticle($id);
        require('./view/listArticlesView.php');
    }

    public function getArticle($id)
    {
        $article = $this->modelArticle->getArticle($id);
        $article = $article->fetch();
        $comments = $this->getComments($id);
        //$updateArticle = $this->changeArticle($id);
        //$deleteArticle = $this->stopArticle($id);
        require('./view/articleView.php');
    }

    //CONTROL SUR LES ACTIONS ARTICLE

    public function addArticle($title, $content) {
        $newArticle = $this->modelArticle->postArticle($title, $content);
        if ($newArticle === false) {
            throw new Exception('Impossible d\'ajouter le article !');
        }
        else {
            echo "coucou";
            header('Location: index.php?action=admin');
        }
    }

    public function showArticle($id) {
        $initialArticle = $this->modelArticle->getArticle($id);
        $initialArticle = $initialArticle->fetch();
        require('./view/adminArticleUpdateView.php');
    }

    public function changeArticle ($id, $title, $content) {
        $updateArticle = $this->modelArticle->updateArticle($id, $title, $content);
        echo "coucou controller";
        if ($updateArticle === false) {
            throw new Exception('Impossible de modifier le article !');
        }
        else {
            header('Location: index.php?action=admin');
        }    
    }

    public function stopArticle ($id){
        $deleteArticle = $this->modelArticle->deleteArticle($id);
        echo "coucou controller";
        if ($deleteArticle == false) {
            throw new Exception('Impossible de supprimer ce commentaire');
        } else {
            header('location: index.php?action=admin');
        }
        ///if(($this->endArticle($id)) === false){
         //   throw new Exception('Impossible de supprimer le article');
        //}
        //else {
            
            //require('./view/adminView.php');
            //header('Location : index.php?action=admin');
        //}
        //return $deleteArticle;
    }

    //

    //CONTROL SUR LES COMMENTAIRES

    public function getComments($id)
    {
        $comments = $this->modelArticle->getComments($_GET['id']);
        return $comments;
    }

    public function addComment($articleid, $author, $content)
    {
        $affectedLines = $this->modelArticle->postComment($articleid, $author, $content);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=article&id=' . $articleid);
        }

}
}