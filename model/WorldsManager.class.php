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
                world_name = :world_name,
                world_photo_link=:world_photo_link;
            ");
            //attribution des cles
            $q->bindValue(':world_name', mysql_real_escape_string($world->world_name()), PDO::PARAM_INT);
            $q->bindValue(':world_photo_link', mysql_real_escape_string($world->world_photo_link()), PDO::PARAM_INT);
            $q->execute();//execution
            $q->closeCursor();//fermeture de l'execution
        }
        
        // fonction permettant de récuperer un monde
        public function get($id)
        {
            $id = (int) mysql_real_escape_string($id);
            
            $q = $this->db->query('SELECT * FROM world WHERE world_id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            if (!empty($donnees)){
                return new World($donnees);
            }
        }
        
           //fonction permetant d'avoir une liste de famille
        public function getList()
        {
            
            $worlds = array();
            
            $q = $this->db->query('SELECT * FROM world ORDER BY world_id');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $worlds[] = new World($donnees);
            }

            return $worlds;
            
        }
        
        public function getFamilysNumber($id) {
            $id=mysql_real_escape_string($id);
            if (!empty($id)){
                $q = $this->db->query('SELECT COUNT(*) FROM world WHERE world_id='.$id);
                 $donnees = $q->fetch(PDO::FETCH_ASSOC);
                 return count($donnees);
            }
        }

        //Attribution de la db
        public function setDb(PDO $db)
        {
            $this->db = $db;
        }
}//fin de la classe

