<!--
	Allow to upload an image for a monster
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pocket-monster</title>
	</head>

	<body>
		<form action="add_monster.php" method="post" enctype="multipart/form-data">
		<table>

			<tr>
			<?php
			if (isset($_POST['name']) && isset($_POST['world_select']) && isset($_POST['family_select']))
			{
				?>
				<td>
					<label for='file'>Select a file to upload : </label>
				</td><td>
					<input type="file" name="userfile" id="file">
				</td>
				<?php
				echo "<input type='hidden' name='name' value='" . $_POST['name'] . "' />";
				echo "<input type='hidden' name='world_select' value='" . $_POST['world_select'] . "' />";
				echo "<input type='hidden' name='family_select' value='" . $_POST['family_select'] . "' />";
			}
			else
			{
				echo "Incorrect form, please try again.";
			}
			?>
			</tr>
			<tr><td>
				<button>Upload file or continue</button>
			</td><td>
				<button onclick='document.location.href="../admin.php"; return false;'>Go back to the admin page</button>
			</td></tr>
		</table>
		</form>
	</body>
</html> 