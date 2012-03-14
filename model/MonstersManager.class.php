<?php
    class MonstersManager
    {
        private $db; // Instance de PDO
        
        public function __construct($db)
        {
            $this->setDb($db);
        }
        
        // fonction permetant d'ajouter un monstre
        public function add(Monster $monster)
        {

            $q = $this->db->prepare //preparation
            ("INSERT INTO monster SET 
                name = :name,
                family_id=:family_id,
                photo_link=:photo_link,
                hair_color=:hair_color,
                skin_type = :skin_type,
                blood_type = :blood_type,
                teeth=:teeth;
            ");
            //association des cles
            $q->bindValue(':name', $monster->name(), PDO::PARAM_INT);
            $q->bindValue(':family_id', $monster->family_id(), PDO::PARAM_INT);
            $q->bindValue(':photo_link', $monster->photo_link(), PDO::PARAM_INT);
            $q->bindValue(':hair_color', $monster->hair_color(), PDO::PARAM_INT);
            $q->bindValue(':skin_type', $monster->skin_type(), PDO::PARAM_INT);
            $q->bindValue(':blood_type', $monster->blood_type(), PDO::PARAM_INT);
            $q->bindValue(':teeth', $monster->teeth(), PDO::PARAM_INT);
            //execution
            $q->execute();
            //fermeture de l'execution
            $q->closeCursor();
        }
        
        // fonction permettant de récuperer un monstre en particulier
        public function get($id)
        {
            $id = (int) $id;
            
            $q = $this->db->query('SELECT * FROM monster WHERE monster_id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            if (!empty($donnees)){
                return new Monster($donnees);
            }
        }
        
        //fonction permetant d'avoir une liste de monstre
        public function getListByFamily($family_id)
        {
            
            $monsters = array();
            $family_id=(int)$family_id;
            $q = $this->db->query('SELECT * FROM monster WHERE family_id ='.$family_id);
            
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $monsters[] = new Monster($donnees);
            }

            return $monsters;
        }
        
        //Attribution de la db
        public function setDb(PDO $db)
        {
            $this->db = $db;
        }
    }