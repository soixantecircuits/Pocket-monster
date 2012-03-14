<?php
    class MonstersManager
    {
        private $db; // Instance de PDO
        
        public function __construct($db)
        {
            $this->setDb($db);
        }
        
        public function add(Monster $monster)
        {
            $q = $this->db->prepare
            ("INSERT INTO monster SET 
                name = :name,
                family_id=:family_id,
                hair_color=:hair_color,
                skin_type = :skin_type,
                blood_type = :blood_type,
                teeth=:teeth;
            ");

            $q->bindValue(':name', $monster->name(), PDO::PARAM_INT);
            $q->bindValue(':family_id', $monster->family_id(), PDO::PARAM_INT);
            $q->bindValue(':hair_color', $monster->hair_color(), PDO::PARAM_INT);
            $q->bindValue(':skin_type', $monster->skin_type(), PDO::PARAM_INT);
            $q->bindValue(':blood_type', $monster->skin_type(), PDO::PARAM_INT);
            $q->bindValue(':teeth', $monster->teeth(), PDO::PARAM_INT);
         
            $q->execute();
        }
        
        
        public function get($id)
        {
            $id = (int) $id;
            
            $q = $this->db->query('SELECT * FROM monster WHERE id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            return new Monster($donnees);
        }
        
        public function getList()
        {
            $monsters = array();
            
            $q = $this->db->query('SELECT * FROM monster ORDER BY name');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $monsters[] = new Monster($donnees);

            }
            
            return $monsters;
        }
        
        public function setDb(PDO $db)
        {
            $this->db = $db;
        }
    }