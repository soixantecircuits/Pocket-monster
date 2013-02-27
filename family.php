<?php
	include 'operations.php';
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
	
	<script language="javascript"/> 
		function ret(){
			document.location.href="world.php";
		}
	</script>
	
<?php
	include(operations.php);
	
	//if we access a world 
	if(isset($_POST['w_access'])){
		$mydb = new MyDB();
		$familyManager = new FamilyManager($mydb);
		$names = $familyManager->getByWorld($mydb, $_POST['the_world']); //getting all worlds
	}
	//if we delete a world
	if(isset($_POST['w_delete'])){
		$mydb = new MyDB();
		$worldManager = new WorldManager($mydb);
		$worldManager->delete($mydb, $_POST["the_world"]);
		//return to world.php after deleting
		echo '<script language="javascript"> ret(); </script>';
	}
?>
	
	<body>
		<form method="post" action="monster.php" >
			<fieldset>
				<?php
					//we going to show all the worlds contained on the world table
					if(!empty($names)){
						foreach($names as $value){
							echo '<input type="radio" name="the_world" value="'.$value.'"/>'.$value.'</label><br/>';
							echo '<p><input type="submit" name="w_access" value="Access"></p>';
							echo '<p><input type="submit" name="w_delete" value="Delete"></p>';
							echo '<p><input type="button" value="Return" onclick="ret();"></p>';
						}
					}else{
						echo '<p><center>><h1><label>No Family Created. </label></h1></center></p>';
					}
					//this button is for creating world
					echo '<p> <input type="submit" name="family_form" value="Creat Family !"/> </p>';
				?>
			</fieldset>
			<?php
				//we genere a form when user click on Creat World button
				if(isset($_POST['family_form'])){
					echo '<form method="post" action="family.php" >';
					echo '<fieldset>';
					echo '<legend>Creat Family </legend>';
					echo '<p> <label for="f_name">Family\'s Name :</label> <input type="text" name="f_name" required/> </p>';
					echo '<p> <label for="f_name">Family\'s World :</label><br/>';
					//we get all worlds names
					$mydb = new MyDB();
					$worldManager = new WorldManager($mydb);
					$allWorlds = $worldManager->getAll($mydb);
					foreach($allWorlds as $value){
						echo '<option value="'.$value.'">'.$value.'</option>';
					}
					echo '</select></p>';
					echo '<p> <label for="f_pic">Family\'s Picture :</label> <input type="text" name="f_pic" required/> </p>';
					echo '<p> <label for="f_pic">Family\'s Maximum Number :</label> <input type="number" name="f_max"/> </p>';
					echo '<p> <input type="submit" name="creat_family" value="Creat This Family !"/> </p>';
					echo '</fieldset>';
					echo '</form>';
				}
			?>
		</form>
	</body>
</html>