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

            $q = $this->db->prepare 
            ("INSERT INTO family SET 
                family_name = :family_name,
                world_id =:world_id,
                family_photo_link= :family_photo_link,
                family_max_number= :family_max_number;
            ");
            //association des cles
            $q->bindValue(':family_name', $family->family_name(), PDO::PARAM_INT);
            $q->bindValue(':world_id', $family->world_id(), PDO::PARAM_INT);
            $q->bindValue(':family_photo_link', $family->family_photo_link(), PDO::PARAM_INT);
            $q->bindValue(':family_max_number', $family->family_max_number(), PDO::PARAM_INT);

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
        
        //fonction permetant d'avoir une liste de famille toutes les familles
        public function getList()
        {
            
            $familys = array();
            
            $q = $this->db->query('SELECT * FROM family ORDER BY family_id');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $familys[] = new Family($donnees);
            }

            return $familys;
            
        }
        //focntion perement d'avoir une liste de famille en fonction du monde
        public function getWorldList($worldId) {
               $familys = array();
               $worldId=(int)$worldId; 
            $q = $this->db->query('SELECT * FROM family WHERE world_id='.$worldId.' ORDER BY family_id');


            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $familys[] = new Family($donnees);
            }

            return $familys;
        }
        
        public function getRatio($id){
            $ratio = array();
            $id = (int) $id;
            
            $q = $this->db->query('SELECT COUNT(*) FROM monster WHERE family_id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);

            $ratio["member"]=$donnees["COUNT(*)"];

            $q = $this->db->query('SELECT family_max_number FROM family WHERE family_id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);

            $ratio["max_number"]=$donnees["family_max_number"];
            
            $ratio["ratio"]="".$ratio["member"]."/".$ratio["max_number"];
           
            return $ratio;
        }
        //Attribution de la db
        public function setDb(PDO $db)
        {
            $this->db = $db;
        }
    }