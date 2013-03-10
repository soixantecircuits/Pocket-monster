<?php
	if(!class_exists('SQLite3'))
		die("SQLite3 Not Supported");
	
	//this class creat dataBase in file mydb.db
	class MyDB extends SQLite3{
		function __construct(){
			$this->open('base/mydb.db',SQLITE3_OPEN_READWRITE);
		}
	} 
	require_once ('monsterManager.php');
	require_once ('familyManager.php');
	require_once ('worldManager.php');
	
	//function that redirect.
	function Redirect($dest) {
      if (!headers_sent())
        header('Location: ' . $dest);
      else
        echo '<script language="JavaScript">window.location=\'' . $dest . '\'</script>';
    }
	
	//connection to DB
	$mydb = new MyDB();
	//creating the world manager
	$worldManager = new WorldManager($mydb);
	//creat the family manager
	$familyManager = new FamilyManager($mydb);
	//creat the Monster manager
	$monsterManager = new MonsterManager($mydb);

?>