<?php

require_once('Connexion.php');

class Model extends Connexion {
    protected $db;

    public function __construct(){
        $this->db = $this->getDb();
    }

    public function getEpisodes()
    {
        $sql = 'SELECT * FROM articles ORDER BY id DESC';
        $request = $this->db->query($sql);

        return $request;
    }

    public function getEpisode($id){
        $request = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $request->execute();
        return $request;
    }

}