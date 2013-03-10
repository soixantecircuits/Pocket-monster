<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>All Families</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	
	<body>	
		<form method="post" action="monsterPage.php" >
			<fieldset> <center>
			<legend> <h2> All Families of <?php echo $_POST["the_world"] ?></h2> </legend>
			<?php			
				require_once("formSelecting.php");
				if(isset($_POST['w_delete'])){
					require_once("base/connexion.php");
					Redirect('deletingManage.php?is=world&name='.$_POST["the_world"]);
				}
				//we apply the familySelect function 
				familySelect();
			?>
			</center></fieldset>
		</form>
					
		<form method="post" action="inscrFamily.php" >
			<fieldset></center>
				<p> <center><input type="submit" name="family_form" value="Creat Family !"/>
			</center></fieldset>
		</form>		
	</body>
</html>