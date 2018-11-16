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
        $articleslist = $this->modelArticle->getArticles();
        require('./view/adminView.php');
    }

    public function getAdminConnexion ($pseudo, $password) {
        $result = $this->modelArticle->adminConnexion($pseudo, $password);
        $isPasswordCorrect = password_verify($_POST['password'], $result['password']);
        if (!$result)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                //$_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $pseudo;
                echo 'Vous êtes connecté !';
            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
            }

        }

    }

    //public function idAdmin(){
    //    $admin = $this->modelArticle->getAdminId();
    //    return $admin;
    //}

    //public function passwdAdmin (){
    //    $adminPassWord = $this->modelArticle->getAdminPW();
    //    return $adminPassWord;

    //}

    public function getArticles()
    {
        $articlesList = $this->modelArticle->getArticles();
        require('./view/listArticlesView.php');
    }

    public function getArticle($id)
    {
        $article = $this->modelArticle->getArticle($id);
        $article = $article->fetch();
        $comments = $this->getComments($id);
        $updateArticle = $this->changeArticle($id);
        $deleteArticle = $this->stopArticle($id);
        require('./view/articleView.php');
    }

    //CONTROL SUR LES ACTIONS ARTICLE

    public function addArticle($id, $title, $content) {
        $newArticle = $this->modelArticle->postArticle($id, $title, $content);
        if ($newArticle === false) {
            throw new Exception('Impossible d\'ajouter le article !');
        }
        else {
            header('Location: index.php?action=blog');
        }
    }

    public function changeArticle ($id){
        $updateArticle = $this->modelArticle->updateArticle($id);
        return $updateArticle;
    }

    public function stopArticle ($id){
        $deleteArticle = $this->modelArticle->deleteArticle($id);
        return $deleteArticle;
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