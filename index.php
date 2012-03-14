<?php
    function chargerClasse ($classe)
    {
        require $classe . '.class.php'; // On inclu la classe
    }
    
    spl_autoload_register ('chargerClasse'); // On apellera la fonction si la classe n'est pas instanciee

       $monstre = new Monster( array(
        'name' => 'Chouch',
        'family_id' => 5,
        'photo_link' => "yeay",
        'hair_color' => "jaune",
        'skin_type' => "poilu",
        "blood_type"=> "vampire",
        "teeth"=>32
    ));


    
    $db = new PDO('mysql:host=localhost;dbname=pocket_monster_schobbent', 'root', '');
    $manager = new MonstersManager($db);
    
    $manager->add($monstre);


    

    
  
?>