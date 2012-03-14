<?php
	class Monster 
	{
		//caractéristiques
		private $monster_id; // son identifiant
		private $name; //le nom du monstre
		private $family_id; //jointure avec la famille
		private $photo_link; //lien vers la photo
		private $hair_color; //couleur de cheveux du monstre
		private $skin_type; //la couleur de peau du monstre
		private $blood_type; //la race du monstre
		private $teeth;//le nombre de dents du monstre

		//fonctions get
		public function monster_id() { return $this->monster_id; }
        public function name() { return $this->name; }
        public function family_id() { return $this->familyId; }
        public function photo() { return $this->degats; }
        public function hair_color() { return $this->hair_color; }
        public function skinType() { return $this->skinType; }
        public function bloodType() {return $this->bloodType;}

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

        public function setMonster_id($monster_id)
        {
            // l indentifiant du monstre sera toujours un entier.
            $this->monster_id = (int) $monster_id;
        }
        
        public function setName($name)
        {
            // On verifie qu il s agit bien d'une chaine de caracteres et que le nom n est pas trop long
            if (is_string($name) && strlen($name) <= 30)
            {
                $this->name = $name;
     	    }

        public function setFamily_id($family_id)
        {
 			//la jointure famille sera toujours un entier
            $this->family_id =(int)$family_id;
        }

        public function setPhoto_link($photoLlink)
        {
            $this->photo_link = $photo_link;
        }

        public function setHair_color($hair_color){
        	//la couleur de cheveux du monstre doit etre en caracteres
        	if(is_string($hair_color)){
        		$this->hair_color=$hair_color;
        	}
        }

        public function setSkin_type($skin_type){
        	//le type de peau du monstre doit etre en caracteres
        	if (is_string($skin_type)){
        		$this->skinType=$skinType;
        	}
        }

        public function setBlood_type($blood_type){
        	//la race du monstre doit etre en caracteres
        	if (is_string($blood_type)){
        		$this->blood_type=$blood_type;
        	}
        }

        public function setTeeth($teeth){
        	$this->teeth=(int)$teeth;
        }

    }//fin de la classe
?>