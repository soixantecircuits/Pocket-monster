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
                monster_name = :monster_name,
                family_id=:family_id,
                monster_photo_link=:monster_photo_link,
                monster_hair_color=:monster_hair_color,
                monster_skin_type = :monster_skin_type,
                monster_blood_type = :monster_blood_type,
                monster_teeth=:monster_teeth;
            ");
            //association des cles
            $q->bindValue(':monster_name', $monster->monster_name(), PDO::PARAM_INT);
            $q->bindValue(':family_id', $monster->family_id(), PDO::PARAM_INT);
            $q->bindValue(':monster_photo_link', $monster->monster_photo_link(), PDO::PARAM_INT);
            $q->bindValue(':monster_hair_color', $monster->monster_hair_color(), PDO::PARAM_INT);
            $q->bindValue(':monster_skin_type', $monster->monster_skin_type(), PDO::PARAM_INT);
            $q->bindValue(':monster_blood_type', $monster->monster_blood_type(), PDO::PARAM_INT);
            $q->bindValue(':monster_teeth', $monster->monster_teeth(), PDO::PARAM_INT);
            //execution
            $q->execute();
            //fermeture de l'execution
            $q->closeCursor();
        }
        
        // fonction permettant d'avoir les details sur un monstre en particulier
        public function getDetails($id)
        {
            $id = (int) $id;
            
            $q = $this->db->query('SELECT * FROM monster 
                                   LEFT JOIN family
                                   ON monster.family_id=family.family_id 
                                   LEFT JOIN world
                                   ON family.world_id=world.world_id
                                   WHERE monster_id = '.$id
                                 );

            $donnees = $q->fetch(PDO::FETCH_ASSOC);

            if (!empty($donnees)){
                return $donnees;
            }
            
            else echo mysql_error();
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