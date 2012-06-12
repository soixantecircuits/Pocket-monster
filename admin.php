<!--
	====== admin.php =======
	Administration panel that
	allow users to add a world,
	a family, or a monster with
	the feature to upload pictures.
-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pocket-monster</title>
	</head>

	<body>
		<form id='form' name="form" action="admin.php" method="post" enctype="multipart/form-data">
			<input type='radio' name='create' id='button_world' value='button_world' onclick='click_world();' />Create a World
			<input type='radio' name='create' id='button_family' value='button_family' onclick='click_family();' />Create a family
			<input type='radio' name='create' id='button_monster' value='button_monster' onclick='click_monster();' />Create a Monster

			<table>
				<br />
				<tr>
				<!-- First input, in all creation pages -->
					<td><label for='name' id="lbl_name">Name of the world : </label></td>
					<td><input type="text" name="name" id="name" <?php if (isset($_POST['name'])) echo "value='".$_POST['name']."'"; ?> /></td>
				</tr><tr id ='world'>
				<!-- World choosing, in case of familly and monster creation -->
					<td><label for='world' id="lbl_world">Choose a world</label></td>
					<td>
						<select name="world_select" onchange="this.form.submit();">
							<option value='0'>Choose a world</option>
							<?php
								$ws = "";
								if (isset($_POST['world_select']))
								{
									$ws = $_POST['world_select'];
								}
								
								include 'config/inc_connec.php';
								
								$query = $db->query("SELECT * FROM world");
								
								while ($data = $query->fetch())
								{
									$selected = "";
									if ($ws == $data['id'])
										$selected = " selected='selected' ";
									?>
									<option <?php echo $selected; ?>value='<?php echo $data['id']; ?>'>
										<?php echo $data['name']; ?>
									</option>
									<?php
								}
								
								$query->closeCursor();
							
							?>
						</select>
					</td>
				</tr><tr id ='family'>
				<!-- Family choosing, in case of monster creation -->
					<td><label for='world' id="lbl_family">Choose a family</label></td>
					<td>
						<select name="family_select">
							<option value='0'>Choose a family</option>
							<?php
								if ($ws != "" && $ws != "0")
								{
									include 'config/inc_connec.php';
									
									$query = $db->query("SELECT * FROM family WHERE world='$ws' ");
									
									while ($data = $query->fetch())
									{
										?>
										<option value='<?php echo $data['id']; ?>'>
											<?php echo $data['name']; ?>
										</option>
										<?php
									}
									
									$query->closeCursor();
								}
							?>
						</select>
					</td>
				</tr><tr>
					<td><button onclick='send_form();'>Submit</button></td>
				</tr>
			</table>
		</form>
		
		<script src='js/admin_button.js'></script>
		<!-- Auto-actualization after each action to keep the choices -->
		<?php
			if (isset($_POST['create']) && $_POST['create'] == "button_family")
			{
				echo '<script>click_family();</script>';

			}
			else if (isset($_POST['create']) && $_POST['create'] == "button_monster")
			{
				echo '<script>click_monster();</script>';
			}
			else
			{
				echo '<script>click_world();</script>';
			}
		?>
		
	</body>
</html>