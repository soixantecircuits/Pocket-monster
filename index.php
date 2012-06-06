<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pocket-monster</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<?php
			try
			{
				$db = new PDO("mysql:host=localhost;dbname=pocket-monster", "root", "");
			}
			catch(Exception $e)
			{
				die('Error : '.$e->getMessage());
			}
		?>
		<form id='form' name="form" action="index.php" method="post">
			<input type='hidden' id='world_form' name='world_form' value='' />
			<input type='hidden' id='family_form' name='family_form' value='' />
		</form>
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
		
		<table id='family'>
			<?php
			if (isset($_POST['world_form']))
			{
				$world = $_POST['world_form'] + 1;
				$query = $db->query("SELECT * FROM family WHERE world='$world' ");
				$id = 0;
				while ($data = $query->fetch())
				{
					echo '<tr><td onclick="choose_family(' . $id . ')">';
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
		
		<script src='js/script_index.js'></script>
		<?php
			if (isset($_POST['world_form']) && $_POST['world_form'] != '')
			{
				echo '<script>update_world('.$_POST['world_form'].');</script>';
			}
			if (isset($_POST['family_form']) && $_POST['family_form'] != '')
			{
				echo '<script>update_family('.$_POST['family_form'].');</script>';
			}			
		?>
	</body>
</html>