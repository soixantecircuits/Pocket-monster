<?php
    class WorldsManager
    {
        private $db; // Instance de PDO
        
        public function __construct($db)
        {
            $this->setDb($db);
            
        }
        
        // fonction permetant d'ajouter un monde
        public function add(World $world)
        {

            $q = $this->db->prepare //preparation
            ("INSERT INTO world SET 
                name = :name,
                photo_link=:photo_link;
            ");
            $q->bindValue(':name', $world->name(), PDO::PARAM_INT);
            $q->bindValue(':photo_link', $world->photo_link(), PDO::PARAM_INT);
            $q->execute();//execution
            $q->closeCursor();//fermeture de l'execution
        }
        
        // fonction permettant de récuperer un monde
        public function get($id)
        {
            $id = (int) $id;
            
            $q = $this->db->query('SELECT * FROM world WHERE world_id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            return new World($donnees);
    
        }
        
        //fonction permetant d'avoir une liste de monde
        public function getList()
        {

            $q = $this->db->query('SELECT * FROM world ORDER BY name');
            

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $worlds= new World($donnees);
                echo $world->name();
            }
            
        }

        //Attribution de la db
        public function setDb(PDO $db)
        {
            $this->db = $db;
        }
}//fin de la classe

