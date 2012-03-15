<div class="hero-unit">
  <h1> Family </h1>
</div>

<form  class="span4 offset4" method="post" action="admin.php?page=family" enctype="multipart/form-data">
     <label for="name">Family's name :</label><br/>
     <input type="text" name="name" id="name" /><br/>
     <label for="world">Family's world :</label><br/>
     <!-- Familles -->
     <select name="world" id="world">
		<?php //creation du repertoire des familles
			for ($i = 0; $i < count($worldList); $i++) {
				echo "<option value='".$worldList[$i]->world_id()."'>".$worldList[$i]->world_name()."</option>";
			  }
		?>
	</select>
	<br/>
	<label for="max_number">Family's number max</label>
	<br/>
	<input type="range" id="max_number" name="max_number" min="0" max="50" value="30" onchange="showValue(this.value)" />
	<span id="range">30</span>
	<!-- Photo -->
     <label for="photo">Put a picture</label>
     <input type="file" name="photo" id="photo" /><br/>
     <input class="btn" id ="submit" type="submit" name="submit" value="Send" />
     <a href="admin.php" class="btn">Cancel</a>
</form>
<script>
	function showValue(newValue)
	{
		document.getElementById("range").innerHTML=newValue;
	}

	</script>
