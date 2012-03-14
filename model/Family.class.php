<?php
	class Family
	{
		//caractéristiques
        private $family_id;
		private $name; //le nom du monstre
        private $world_id; //jointure avec le monde
        private $maxi_number; // la taille max de la famille
        private $photo_link; // l'url de l'image

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
        public function name() { return $this->name; }
        public function world_id() {return $this->world_id; }
        public function photo_link() { return $this->photo_link; }
        public function maxi_number() { return $this->maxi_number; }

        //fonctions set
        public function setFamily_id($family_id)
        {
            $this->family_id = (int) $family_id;
        }
        
        public function setName($name)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le nom n est pas trop long
            if (is_string($name) && strlen($name) <= 30)
            {
                $this->name = $name;
     	    }
        }

        public function setWorld_id($world_id)
        {
            $this->world_id = (int)$world_id;

        }

        public function setMaxi_number($maxi_number)
        {
                $this->maxi_number = (int) $maxi_number;
            
        }

        public function setPhoto_link($photo_link)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le lien n est pas trop long
            if (is_string($photo_link) && strlen($photo_link) <= 100){
                $this->photo_link = $photo_link;
            }
        }



    }//fin de la classe
?>