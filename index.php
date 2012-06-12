<!--
	===== index.php ======
	User's page, allow the user to choose a world,
	a family that is linked	to this world and a monster
	linked to this family. When selecting the monster,
	some informations are displayed.
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pocket-monster</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<?php
		include 'config/inc_connec.php';
		?>
		<!-- Hidden forms to keed the values after each action -->
		<form id='form' name="form" action="index.php" method="post">
			<input type='hidden' id='world_form' name='world_form' value='' />
			<input type='hidden' id='family_form' name='family_form' value='' />
			<input type='hidden' id='family_id' name='family_id' value='' />
			<input type='hidden' id='monster_form' name='monster_form' value='' />
			<input type='hidden' id='monster_id' name='monster_id' value='' />
		</form>
		
		<!-- Table for the world selection -->
		<table id='world_table'>
			<?php
			$query = $db->query("SELECT * FROM world");
			$id = 0;
			while ($data = $query->fetch())
			{
				echo '<tr><td onclick="choose_world(' . $id . ')">';
				if ($data['img'] == null)
				{
					?><img src='img_world/default.png' /><?php
				}
				else
				{
					?><img src='img_world/<?php echo $data['img'] ?>' /><?php
				}
				echo '<br />';
				echo $data['name'];
				echo '</td></tr>';
				$id = $id + 1;
			}

			$query->closeCursor();

			?>
		</table>
		
		<!-- Table for the family selection -->
		<table id='family_table'>
			<?php
			if (isset($_POST['world_form']))
			{
				$world = $_POST['world_form'] + 1;
				$query = $db->query("SELECT * FROM family WHERE world='$world' ");
				$id = 0;
				while ($data = $query->fetch())
				{
					echo '<tr><td onclick="choose_family(' . $id . ', ' . $data['id'] . ')">';
					if ($data['img'] == null)
					{
						?><img src='img_family/default.png' /><?php
					}
					else
					{
						?><img src='img_family/<?php echo $data['img'] ?>' /><?php
					}
					echo '<br />';
					echo $data['name'];
					echo '</td></tr>';
					$id = $id + 1;
				}

				$query->closeCursor();
			}
			?>
		</table>
		
		<!-- Table for the monster selection -->
		<table id='monster_table'>
			<?php
			if (isset($_POST['family_form']) && $_POST['family_form'] != '')
			{
				$world = $_POST['world_form'] + 1;
				$family = $_POST['family_id'];
				$query = $db->query("SELECT * FROM monster WHERE family='$family' ");
				$id = 0;
				while ($data = $query->fetch())
				{
					echo '<tr><td onclick="choose_monster(' . $id . ', ' . $data['id'] . ')">';
					if ($data['img'] == null)
					{
						?><img src='img_monster/default.png' /><?php
					}
					else
					{
						?><img src='img_monster/<?php echo $data['img'] ?>' /><?php
					}
					echo '<br />';
					echo $data['name'];
					echo '</td></tr>';
					$id = $id + 1;
				}

				$query->closeCursor();
			}
			?>
		</table>
		
		<!-- Table for that display informations about the monster -->
		<table id='monster_info'>
			<?php
			if (isset($_POST['monster_form']) && $_POST['monster_form'] != '')
			{
				$id = $_POST['monster_id'];
				$query = $db->query("SELECT * FROM monster WHERE id='$id'");
				$data = $query->fetch();
				echo '<tr><td>Id : </td><td>'.$data['id'].'</td></tr>';
				echo '<tr><td>Name : </td><td>'.$data['name'].'</td></tr>';
				$query->closeCursor();
				
				$family = $data['family'];
				$query = $db->query("SELECT * FROM family WHERE id='$family'");
				$dataFamily = $query->fetch();
				echo "<tr><td>Family's id : </td><td>".$dataFamily['id']."</td></tr>";
				echo "<tr><td>Family's name : </td><td>".$dataFamily['name']."</td></tr>";
				$query->closeCursor();
				
				$world = $dataFamily['world'];
				$query = $db->query("SELECT * FROM world WHERE id='$world'");
				$dataWorld = $query->fetch();
				echo "<tr><td>World's id : </td><td>".$dataWorld['id']."</td></tr>";
				echo "<tr><td>World's name : </td><td>".$dataWorld['name']."</td></tr>";
				$query->closeCursor();
			}
			?>
		</table>
		
		<!-- Auto-actualization after each action to keep the choices -->
		<script src='js/script_index.js'></script>
		<?php
			if (isset($_POST['world_form']) && $_POST['world_form'] != '')
			{
				echo '<script>update_world('.$_POST['world_form'].');</script>';
			}
			if (isset($_POST['family_form']) && $_POST['family_form'] != '')
			{
				echo '<script>update_family('.$_POST['family_form'].', ' . $_POST['family_id'] . ');</script>';
			}
			if (isset($_POST['monster_form']) && $_POST['monster_form'] != '')
			{
				echo '<script>update_monster('.$_POST['monster_form'].', ' . $_POST['monster_id'] . ');</script>';
			}
		?>
	</body>
</html>