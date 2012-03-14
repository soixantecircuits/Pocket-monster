<?php
	class World
	{
		//caractéristiques
        private $world_id;
		private $name; //le nom du monde
        private $photo_link;//l'url de la photo
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
        public function world_id() { return $this->world_id; }
        public function name() { return $this->name; }
        public function photo_link() { return $this->photo_link; }


        //fonctions set
        public function setworld_id($world_id)
        {
            $this->world_id = (int) $world_id;
        }
        
        public function setName($name)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le nom n est pas trop long
            if (is_string($name) && strlen($name) <= 30)
            {
                $this->name = $name;
     	    }
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