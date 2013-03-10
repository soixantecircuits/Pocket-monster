<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Creat World</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	
	<body>
		<form method="post" action="creatingManage.php?is=world" >
			<fieldset>
				<legend>Creat Another World </legend>
				<p> <label for="w_name">World\'s Name :</label> <input type="text" name="w_name" required/> </p>
				<p> <label for="w_pic">World\'s Picture :</label> <input type="file" name="w_pic"/> </p>
				<p> <input type="submit" name="creat_world" value="Creat This World !"/> </p>
			</fieldset>
		</form>
	</body>
</html>
