<?php
	class World
	{
		//caractéristiques
        private $world_id;
		private $world_name; //le nom du monde
        private $world_photo_link;//l'url de la photo
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
        public function world_name() { return $this->world_name; }
        public function world_photo_link() { return $this->world_photo_link; }


        //fonctions set
        public function setWorld_id($world_id)
        {
            $this->world_id = (int) $world_id;
        }
        
        public function setWorld_name($world_name)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le nom n est pas trop long
            if (is_string($world_name) && strlen($world_name) <= 30)
            {
                $this->world_name = $world_name;
     	    }
        }

       public function setWorld_photo_link($world_photo_link)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le lien n est pas trop long
            if (is_string($world_photo_link) && strlen($world_photo_link) <= 100){
                $this->world_photo_link = $world_photo_link;
            }
            
        }

    }//fin de la classe
?>