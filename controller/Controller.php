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
        $pageTitle = 'Blog de Jean Forteroche';
        require('./view/frontend/indexView.php');
    }

    //ADMIN

    public function getIndexAdmin()
    {
        $articlesList = $this->modelArticle->getArticles();
        $pageTitle = 'Administration';
        require('./view/backend/adminView.php');
    }

    public function getLogin(){ 
        $pageTitle = 'Authentification';
        require('./view/frontend/loginView.php');
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
            $pageTitle = 'Administration';
            require('./view/backend/adminView.php');
        }
        else {
            throw new Exception("<p>Pseudo et/ou mot de passe incorrect(s). Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
    }

    //ARTICLE(S)

        //CREATE

    public function addArticle($title, $content) {
        $newArticle = $this->modelArticle->postArticle($title, $content);
        if ($newArticle === false) {
            throw new Exception("<p>Impossible d'ajouter l'article. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        } 
        else {
            header('location: index.php?action=admin');
        }
    }
        //READ

    public function getArticles()
    {
        $articlesList = $this->modelArticle->getArticles();
        $pageTitle = "Articles d'un billet pour l'Alaska";
        require('./view/frontend/listArticlesView.php');
    }

    public function getArticle($id)
    {
        $article = $this->modelArticle->getArticle($id);
        $article = $article->fetch();
        $pageTitle = $article['title'];
        $comments = $this->getComments($id);
        require('./view/frontend/articleView.php');
    }

        public function showArticle($id) {
        $initialArticle = $this->modelArticle->getArticle($id);
        $initialArticle = $initialArticle->fetch();
        $pageTitle = 'Modifier un article';
        require('./view/backend/adminArticleUpdateView.php');
    }
        //UPDATE

    public function changeArticle ($id, $pseudo, $content) {
        $updateArticle = $this->modelArticle->updateArticle($id, $pseudo, $content);
        if ($updateArticle === false) {
            throw new Exception("<p>Impossible de modifier l'article. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
        else {
            header('Location: index.php?action=article&id=' . $id);
        }    
    }
        //DELETE

    public function stopArticle ($id){
        $deleteArticle = $this->modelArticle->deleteArticle($id);
        if ($deleteArticle === false) {
            throw new Exception("<p>Impossible de supprimer l'article. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        } 
        else {
            header('location: index.php?action=admin');
        }
    }

    //COMMENTS

        //CREATE

    public function addComment($articleid, $author, $content)
    {
        $affectedLines = $this->modelArticle->postComment($articleid, $author, $content);
        if ($affectedLines === false) {
            throw new Exception("<p>Impossible d'ajouter le commentaire. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
        else {
            header('Location: index.php?action=article&id=' . $articleid);
        }
    }
        //READ

    public function getAllComments(){
        $comments = $this->modelArticle->getAllComments();
        $pageTitle = 'Gestion des commentaires';
        require('./view/backend/adminCommentView.php');
    }

    public function getComments($id)
    {
        $comments = $this->modelArticle->getComments($_GET['id']);
        return $comments;
    }
        //UPDATE

    public function signaledComment($id){
        $updateComment = $this->modelArticle->warningComment($id);
        $pageTitle = 'Commentaire signalé';
        if ($updateComment === false) {
            throw new Exception("<p>Impossible de signaler le commentaire. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        }
        else {
            require('./view/frontend/warningCommentView.php');
        }  
    }

    public function isNotSignaledComment($id) {
        $updateComment = $this->modelArticle->validComment($id);
        $pageTitle = 'Validation';
        if ($updateComment === true) {
            require('./view/backend/adminValidComment.php');
        }
        else {
            throw new Exception("<p>Impossible de valider le commentaire. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
            
        }  
    }
        //DELETE

    public function stopComment($id){
        $deleteComment = $this->modelArticle->deleteComment($id);
        if ($deleteComment === false) {
            throw new Exception("<p>Impossible de supprimer le commentaire. Retour à la page d'accueil <a href=\"index.php?action=blog\">ici</a></p>");
        } 
        else {
            header('location: index.php?action=adminComment');
        }

    }
}