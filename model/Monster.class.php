<?php
	class Monster 
	{
		//caractéristiques
        private $monster_id;
		private $monster_name; //le nom du monstre
		private $family_id; //jointure avec la famille
		private $monster_photo_link; //lien vers la photo
		private $monster_hair_color; //couleur de cheveux du monstre
		private $monster_skin_type; //la couleur de peau du monstre
		private $monster_blood_type; //la race du monstre
		private $monster_teeth;//le nombre de dents du monstre

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
        public function monster_id() { return $this->monster_id; }
        public function monster_name() { return $this->monster_name; }
        public function family_id() { return $this->family_id; }
        public function monster_photo_link() { return $this->monster_photo_link; }
        public function monster_hair_color() { return $this->monster_hair_color; }
        public function monster_skin_type() { return $this->monster_skin_type; }
        public function monster_blood_type() {return $this->monster_blood_type;}
         public function monster_teeth() {return $this->monster_teeth;}

        public function setMonster_id($monster_id)
        {
            // l indentifiant du monstre sera toujours un entier.
            $this->monster_id = (int) $monster_id;
        }
        
        public function setMonster_name($monster_name)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le nom n est pas trop long
            if (is_string($monster_name) && strlen($monster_name) <= 30)
            {
                $this->monster_name = $monster_name;
     	    }
        }

        public function setFamily_id($family_id)
        {
 			//la jointure famille sera toujours un entier
            $this->family_id =(int)$family_id;
        }

        public function setMonster_photo_link($monster_photo_link)
        {
            $this->monster_photo_link = $monster_photo_link;
        }

        public function setMonster_hair_color($monster_hair_color){
        	//la couleur de cheveux du monstre doit etre en caracteres
        	if(is_string($monster_hair_color)){
        		$this->monster_hair_color=$monster_hair_color;
        	}
        }

        public function setMonster_skin_type($monster_skin_type){
        	//le type de peau du monstre doit etre en caracteres
        	if (is_string($monster_skin_type)){
        		$this->monster_skin_type=$monster_skin_type;
        	}
        }

        public function setMonster_blood_type($monster_blood_type){
        	//la race du monstre doit etre en caracteres
        	if (is_string($monster_blood_type)){
        		$this->monster_blood_type=$monster_blood_type;
        	}
        }

        public function setMonster_teeth($monster_teeth){
        	$this->monster_teeth=(int)$monster_teeth;
        }

    }//fin de la classe
?>