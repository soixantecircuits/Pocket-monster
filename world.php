<?php
	include 'operations.php';
	//getting connection;
	$mydb = new MyDB();
	$worldManager = new WorldManager($mydb);
	$familyManager = new FamilyManager($mydb);
	$monsterManager = new MonsterManager($mydb);
	//if we creat a world 
	if(isset($_POST['creat_world'])){
		//setting the picture 
		if(is_image($_POST['w_pic']))
			$image = $_POST['w_pic'];
		else
			$image = "doc/world.png"; //default image
		
		$world = new World($_POST['w_name'], $image);
		$worldManager->add($mydb, $world);
	}
	$names = $worldManager->getAll($mydb); //getting all worlds names&
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>All Your Worlds !</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	
	<body>
		<form method="post" action="family.php" >
			<fieldset>
				<center> 
				<legend> All your Worlds </legend>
				<?php
					//we going to show all the worlds contained on the world table
					if(!empty($names)){
						
						foreach($names as $value){
							echo '<p><input type="radio" name="the_world" value="'.$value.'"/>'.$value.'</label></p>';
						}
						echo '<p><input type="submit" name="w_access" value="Access">';
						echo '<input type="submit" name="w_delete" value="Delete">';
						echo '<input type="submit" name="family_form" value="Creat Family !"></p>';
						
					}else{
						echo '<p><center>><h1><label>No World Created. </label></h1></center></p>';
					}
				?>
				</center>
			</fieldset>
		</form>
		<form method="post" action="world.php" >
			<fieldset> <center>
				<p> <input type="submit" name="world_form" value="Creat World !"/> </p>
			</center></fieldset>
		</form>
		
		<?php
			//we genere a form when user click on Creat World button
			if(isset($_POST['world_form'])){
				echo '<form method="post" action="world.php" >';
				echo '<fieldset>';
				echo '<legend>Creat Another World </legend>';
				echo '<p> <label for="w_name">World\'s Name :</label> <input type="text" name="w_name" required/> </p>';
				echo '<p> <label for="w_pic">World\'s Picture :</label> <input type="file" name="w_pic"/> </p>';
				echo '<p> <input type="submit" name="creat_world" value="Creat This World !"/> </p>';
				echo '</fieldset>';
				echo '</form>';
			}
		?>
	
	</body>
</html>