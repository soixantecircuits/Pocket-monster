<ul>
   <?php 
		for ($i = 0; $i < count($familyList); $i++) {
			echo "<li><a href='?page=family&&family_id=".$familyList[$i]->family_id()."'>".$familyList[$i]->name()."</a></li>";
		}
	?>
</ul>