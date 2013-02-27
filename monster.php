<?php
	include 'operations.php';
	
	//connection to DB
	$mydb = new MyDB();
	//creating the world manager
	$worldManager = new WorldManager($mydb);
	//creat the family manager
	$familyManager = new FamilyManager($mydb);
	//creat the Monster manager
	$monsterManager = new MonsterManager($mydb);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>All Monsters on <?php echo $_POST['the_world']; ?> Family !</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	<script language="javascript">
		function ret(){
			document.location.href="family.php";
		}
	</script>
	
<?php
	
	//if we delete a world
	if(isset($_POST['f_delete'])){
		$familyManager->delete($mydb, $_POST["the_family"]);
		//return to world.php after deleting
		echo '<script language="javascript"> ret(); </script>';
	}
	//creation of monster
	if(isset($_POST['creat_monster'])){
		if(is_image($_POST['m_pic']))
			$image = $_POST['m_pic'];
		else
			$image = "doc/monster.jpg";
		$monster = new Monster($_POST['m_name'], $_POST['m_age'], $image,$_POST['m_family'], $_POST['m_eyes'], $_POST['m_hair'], $_POST['m_skin']);
		$monsterManager->add($mydb, $monster);
	}
?>
	
	<body>
		<?php
			if(isset($_POST['f_access'])){
				echo '<form method="post" action="monster.php" >';
				echo '<fieldset> <center>';
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
				echo '</center></fieldset></form>';
			}
			
			if(isset($_POST['m_access'])){
				$result = $monsterManager->get($mydb, $_POST['the_monster']);
				if(!empty($result)){
					$theMonster = $result[0];
					var_dump($theMonster);
					echo '<form> <fieldset><center>';
					echo '<legend>Message From '.$_POST['the_monster'].'</legend>';
					echo '<img src="'.$theMonster->_pic.'" style="border:solid 2px #000000;" />';
					echo '<p>'.$theMonster->presentation().'</p>';
					echo '</center></fieldset> </form>';
				}
			}	
		?>
				
			
		<form method="post" action="monster.php" >
			<fieldset></center>
				<p> <center><input type="submit" name="monster_form" value="Creat Monster"/>
				<input type="button" value="Return" onclick="ret();"> </center></p>
			</center></fieldset>
		</form>
			
			<?php
				//we genere a form when user click on Creat World button
				if(isset($_POST['monster_form'])){
					echo '<center>';
					echo '<form method="post" action="monster.php">';
					echo '<fieldset>';
					echo '<legend>Creat Family </legend>';
					echo '<p> <label for="m_name">Monster\'s Name :</label> <input type="text" name="m_name" required/> </p>';
					echo '<p> <label for="m_world">Monster\'s Family :</label>';
					echo '<select name="m_family">';
					//we get all worlds names
					$allFamilies = $familyManager->getAll($mydb);
					foreach($allFamilies as $value){
						echo '<option value="'.$value.'">'.$value.'</option>';
					}
					echo '</select></p>';
					echo '<p> <label for="m_pic">Monster\'s Picture :</label> <input type="file" name="m_pic" required/> </p>';
					echo '<p> <label for="m_age">Monster\'s Age :</label> <input type="number" name="m_age"/> </p>';
					echo '<p> <label for="m_eyes">Monster\'s Eyes Color :</label> <select name="m_eyes">
						<option value="Brown">Brown</option>
						<option value="Blue">Blue</option> 
						<option value="Green">Green</option>
						<option value="Rlack">Black</option>
						</select></p>';
						
					echo '<p> <label for="m_hair">Monster\'s Hair Color :</label> <select name="m_hair">
						<option value="Brown">Brown</option>
						<option value="Black">Black</option> 
						<option value="Yellow">Yellow</option>
						<option value="Red">Red</option>
						</select></p>';
						
					echo '<p> <label for="m_skin">Monster\'s Skin Color :</label> <select name="m_skin">
						<option value="Brown">Brown</option>
						<option value="Black">Black</option> 
						<option value="Yellow">Yellow</option>
						<option value="Red">Red</option>
						</select></p>';
					echo '<p> <input type="submit" name="creat_monster" value="Creat This Monster !"/> </p>';
					echo '</fieldset>';
					echo '</form>';
					echo '</center>';
				}
			?>
		
	</body>
</html>