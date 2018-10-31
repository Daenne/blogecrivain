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

    public function getArticles()
    {
        $articlesList = $this->modelArticle->getArticles();
        require('./view/listArticlesView.php');
    }

    public function getArticle($id)
    {
        $article = $this->modelArticle->getArticle($id);
        $article = $article->fetch();
        require('./view/articleView.php');
    }

    public function getComments($articleid)
    {
        $comments = $this->modelArticle->getComments($_GET['articleid']);
        $comments = $comments->fetch();
        require('./view/articleView.php');
    }
}