<?php
	include 'operations.php';
	
	//connection to DB
	$mydb = new MyDB();
	//creating the world manager
	$worldManager = new WorldManager($mydb);
	//creat the family manager
	$familyManager = new FamilyManager($mydb);
	$monsterManager = new MonsterManager($mydb);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>All Families on <?php echo $_POST['the_world']; ?> World !</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	<script language="javascript">
		function ret(){
			document.location.href="world.php";
		}
	</script>
	
<?php
	
	//if we delete a world
	if(isset($_POST['w_delete'])){
		$worldManager->delete($mydb, $_POST["the_world"]);
		//return to world.php after deleting
		echo '<script language="javascript"> ret(); </script>';
	}
	//if we creat a family
	if(isset($_POST['creat_family'])){
		if(is_image($_POST['f_pic']))
			$image = $_POST['f_pic'];
		else
			$image = "doc/family.jpg";
		$family = new Family($_POST['f_name'], $_POST['f_world'], $image, $_POST['f_max']);
		$familyManager->add($mydb, $family);
	}
?>
	
	<body>
		<?php
			if(isset($_POST['w_access'])){
								
				$names = $familyManager->getByWorld($mydb, $_POST['the_world']); //getting all families
				//get image of the world
				$image = $worldManager->get($mydb, $_POST['the_world']);
				echo '<form method="post" action="monster.php" >';
				echo '<fieldset style="background-image:url("'.$image[0]->pic.'")"> <center>';
				echo '<legend> <h2> The '.$_POST['the_world'].' World Families </h2> </legend>';
				//we going to show all the worlds contained on the world table
				if(!empty($names)){	
					foreach($names as $value){
						echo '<input type="radio" name="the_family" checked="checked" value="'.$value.'"/>'.$value.'</label><br/>';
					}
					
					echo '<p><input type="submit" name="f_access" value="Access">';
					echo '<input type="submit" name="f_delete" value="Delete"></p>';
					
				}else{
					echo '<p><center><h1><label>The '.$_POST['the_world'].' World is Empty !</label></h1></center></p>';
				}
				echo '</center></fieldset> </form>';
			}
				
			
		?>
				
			
		<form method="post" action="family.php" >
			<fieldset></center>
				<p> <center><input type="submit" name="family_form" value="Creat Family !"/>
				<input type="button" value="Return" onclick="ret();"> </center></p>
			</center></fieldset>
		</form>
			
			<?php
				//we genere a form when user click on Creat World button
				if(isset($_POST['family_form'])){
					echo '<center>';
					echo '<form method="post" action="family.php">';
					echo '<fieldset>';
					echo '<legend>Creat Family </legend>';
					echo '<p> <label for="f_name">Family\'s Name :</label> <input type="text" name="f_name" required/> </p>';
					echo '<p> <label for="f_world">Family\'s World :</label>';
					echo '<select name="f_world">';
					//we get all worlds names
					$allWorlds = $worldManager->getAll($mydb);
					foreach($allWorlds as $value){
						echo '<option value="'.$value.'">'.$value.'</option>';
					}
					echo '</select></p>';
					echo '<p> <label for="f_pic">Family\'s Picture :</label> <input type="file" name="f_pic" required/> </p>';
					echo '<p> <label for="f_max">Family\'s Maximum Number :</label> <input type="number" name="f_max"/> </p>';
					echo '<p> <input type="submit" name="creat_family" value="Creat This Family !"/> </p>';
					echo '</fieldset>';
					echo '</form>';
					echo '</center>';
				}
			?>
		
	</body>
</html>