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

        $password == password_hash($password, PASSWORD_DEFAULT);
        ($result['password']) == password_hash(($result['password']), PASSWORD_DEFAULT);

        $isPseudoCorrect = strcmp($pseudo, $result['pseudo']);
        $isPasswordCorrect = strcmp($password, $result['password']);

        if (($isPseudoCorrect == 0) AND ($isPasswordCorrect == 0)) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['authentification'] = true;
            require('./view/adminView.php');
        }
        else {
            $_SESSION['authentification'] = false;
            throw new Exception('Pseudo et/ou mot de passe incorrect(s)');
        }
    }

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
        require('./view/articleView.php');
    }

    //CONTROLE SUR LES ACTIONS ARTICLE

    public function addArticle($title, $content) {
        $newArticle = $this->modelArticle->postArticle($title, $content);
        if ($newArticle == false) {
            throw new Exception('Impossible d\'ajouter le article !');
        }
        else {
            header('Location: index.php?action=admin');
        }
    }

    public function addNewArticle($title, $content) {
        $newArticle = $this->addArticle($title, $content);
        if ($newPost === false) {
            throw new Exception('Impossible d\'ajouter l\'article !');
        } 
        else {
            header('location: index.php?action=admin');
        }
    }

    public function showArticle($id) {
        $initialArticle = $this->modelArticle->getArticle($id);
        $initialArticle = $initialArticle->fetch();
        require('./view/adminArticleUpdateView.php');
    }

    public function changeArticle ($id, $pseudo, $content) {
        $updateArticle = $this->modelArticle->updateArticle($id, $pseudo, $content);
        if ($updateArticle === false) {
            throw new Exception('Impossible de modifier le article !');
        }
        else {
            header('Location: index.php?action=article&id=' . $id);
        }    
    }

    public function stopArticle ($id){
        $deleteArticle = $this->modelArticle->deleteArticle($id);
        if ($deleteArticle === false) {
            throw new Exception('Impossible de supprimer cet article');
        } 
        else {
            header('location: index.php?action=admin');
        }
    }


    //CONTROL SUR LES COMMENTAIRES

    public function getAllComments(){
        $comments = $this->modelArticle->getAllComments();
        require('./view/adminCommentView.php');
    }

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

    public function changeComment($id){
        $updateComment = $this->modelArticle->warningComment($id);
        if ($updateComment === false) {
            throw new Exception('Impossible de signaler le commentaire!');
        }
        else {
            require('./view/warningCommentView.php');
        }  
    }

    public function stopComment($id){
        $deleteComment = $this->modelArticle->deleteComment($id);
        if ($deleteComment === false) {
            throw new Exception("Impossible de supprimer ce commentaire");
        } 
        else {
            header('location: index.php?action=adminComment');
        }

    }
}