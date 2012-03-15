<?php
	class Family
	{
		//caractéristiques
        private $family_id;
		private $family_name; //le nom du monstre
        private $world_id; //jointure avec le monde
        private $family_max_number; // la taille max de la famille
        private $family_photo_link; // l'url de l'image

         public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

       // on hydrate le monstre
       public function hydrate(array $donnees)
		{
		    foreach ($donnees as $key => $value)
		    {
		        // On recupere le nom du setter correspondant à l attribut
		        $method = 'set'.ucfirst($key);
		        
		        // Si le setter correspondant existe
		        if (method_exists($this, $method))
		        {
		            // On appelle le setter
		            $this->$method($value);
		        }
		    }
		}

        //fonctions get
        public function family_id() { return $this->family_id; }
        public function family_name() { return $this->family_name; }
        public function world_id() {return $this->world_id; }
        public function family_photo_link() { return $this->family_photo_link; }
        public function family_max_number() { return $this->family_max_number; }

        //fonctions set
        public function setFamily_id($family_id)
        {
            $this->family_id = (int) $family_id;
        }
        
        public function setFamily_name($family_name)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le nom n est pas trop long
            if (is_string($family_name) && strlen($family_name) <= 30)
            {
                $this->family_name = $family_name;
     	    }
        }

        public function setWorld_id($world_id)
        {
            $this->world_id = (int)$world_id;

        }

        public function setFamily_max_number($family_max_number)
        {
                $this->family_max_number = (int) $family_max_number;
            
        }

        public function setFamily_photo_link($family_photo_link)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le lien n est pas trop long
            if (is_string($family_photo_link) && strlen($family_photo_link) <= 100){
                $this->family_photo_link = $family_photo_link;
            }
        }



    }//fin de la classe
?>