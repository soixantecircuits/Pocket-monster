<?php
//this file contains all form for selecting the three type : world, family, monster

	//the world's selecting form
	function worldSelect(){
		require_once ("base/connexion.php");
		//if we creat a world 
		$names = $worldManager->getAll($mydb); //getting all worlds names&
		//we going to show all the worlds contained on the world table
		if(!empty($names)){
			foreach($names as $value){
				echo '<p><input type="radio" name="the_world" value="'.$value.'"/>'.$value.'</label></p>';
			}
			echo '<p><input type="submit" name="w_access" value="Access">
					<input type="submit" name="w_delete" value="Delete">
					</form></center></fieldset>
					<form method="post" action="inscrFamily.php"><fieldset> <center>
					<input type="submit" name="family_form" value="Creat Family !"></p>';
		}else{
			echo '<p><center>><h1><label>No World Created. </label></h1></center></p>';
		}
	}
	
	
	//the family's selecting form
	function familySelect (){
		require_once ("base/connexion.php");
		if(isset($_POST['w_access'])){
			$names = $familyManager->getByWorld($mydb, $_POST['the_world']); //getting all families
			//get image of the world
			$image = $worldManager->get($mydb, $_POST['the_world']);
			//we going to show all the worlds contained on the world table
			if(!empty($names)){	
				foreach($names as $value){
					echo '<input type="radio" name="the_family" checked="checked" value="'.$value.'"/>'.$value.'</label><br/>';
						
				}
				echo '<p><input type="submit" name="f_access" value="Access">
						<input type="submit" name="f_delete" value="Delete"></p>
						</form></center></fieldset>
						<form method="post" action="inscrMonster.php"> <fieldset> <center>
						<input type="submit" name="family_form" value="Creat Monster !"></p>';
			}else{
				echo '<p><center><h1><label>The '.$_POST['the_world'].' World is Empty !</label></h1></center></p>';
			}
		}
	}
	
	
	//the monster's selecting form
	function monsterSelect(){
		require_once ("base/connexion.php");
		if(isset($_POST['f_access'])){	
			echo '<legend> <h2> The '.$_POST['the_family'].' Family Monsters </h2> </legend>';			
			$names = $monsterManager->getByFamily($mydb, $_POST['the_family']); //getting all monsters of the family
			//we going to show all the worlds contained on the world table
			if(!empty($names)){
				foreach($names as $value){
					echo '<input type="radio" name="the_monster" value="'.$value.'"/>'.$value.'</label><br/>';
				}
				echo '<p><input type="submit" name="m_access" value="Access">';
				echo '<input type="submit" name="m_delete" value="Delete"></p>';
				
			}else{
				echo '<p><center><h1><label>The\'re is no Member in the '.$_POST['the_family'].' Family !</label></h1></center></p>';
			}
			
		}
	}
	
	
	//show the monster's informations
	function showMonster(){
		require_once ("base/connexion.php");
		$result = $monsterManager->get($mydb, $_POST['the_monster']);
		if(!empty($result)){
			$theMonster = $result[0];
			echo '<legend>Message From '.$_POST['the_monster'].'</legend>';
			echo '<img src="'.$theMonster->_pic.'" style="border:solid 2px #000000;" />';
			echo '<p>'.$theMonster->presentation().'</p>';
		}else{
			echo '<p> <label> There is no Monster with this name </label> </p>';
		}
	}
	


?>