<?php
    class FamilysManager
    {
        private $db; // Instance de PDO
        
        public function __construct($db)
        {
            $this->setDb($db);
        }
        
        // fonction permetant d'ajouter une famille
        public function add(Family $family)
        {

            $q = $this->db->prepare //preparation
            ("INSERT INTO family SET 
                name = :name,
                world_id=:world_id,
                photo_link=:photo_link,
                maxi_number=:maxi_number;
            ");
            //association des cles
            $q->bindValue(':name', $family->name(), PDO::PARAM_INT);
            $q->bindValue(':world_id', $family->world_id(), PDO::PARAM_INT);
             $q->bindValue(':photo_link', $family->photo_link(), PDO::PARAM_INT);
            $q->bindValue(':maxi_number', $family->maxi_number(), PDO::PARAM_INT);
            
            $q->execute();//execution
            $q->closeCursor();//fermeture de l'execution
        }
        
        // fonction permettant de récuperer une famille
        public function get($id)
        {
            $id = (int) $id;
            
            $q = $this->db->query('SELECT * FROM family WHERE family_id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            return new Family($donnees);
    
        }
        
        //fonction permetant d'avoir une liste de famille
        public function getList()
        {
            
            $q = $this->db->query('SELECT * FROM family ORDER BY name');
            

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $familys= new Family($donnees);
                echo $family->name();
            }
            
        }
        
        //Attribution de la db
        public function setDb(PDO $db)
        {
            $this->db = $db;
        }
    }