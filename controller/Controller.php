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
        require('.view/adminView.php');
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