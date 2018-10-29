<?php
class Connexion
{
    protected $db;

    public function getDb(){
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=bddblogecrivain', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $db;
            return $this->db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}
