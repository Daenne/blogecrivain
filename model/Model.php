<?php

require_once('Connexion.php');

class Model extends Connexion {
    protected $db;

    public function __construct(){
        $this->db = $this->getDb();
    }

    public function getArticles()
    {
        $sql = 'SELECT * FROM articles ORDER BY id DESC';
        $request = $this->db->query($sql);

        return $request;
    }

    public function getArticle($id){
        $request = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $request->execute();
        return $request;
    }

    public function getComments($id) {
        $comments = $this->db->prepare('SELECT id, articleid, author, content, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE articleid = ? ORDER BY date_create DESC');
        $comments->execute(array($id));
        return $comments;
    }

    public function postComment($articleid, $author, $content) {
        $comments =$this->db->prepare('INSERT INTO comments(articleid, author, content, date_create) VALUES (?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($articleid, $author, $content));
        return $affectedLines;

    }
}