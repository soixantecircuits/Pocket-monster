<h1> Monstre </h1>

<form method="post" action="manager.php" enctype="multipart/form-data">
     <label for="name">Monster's name :</label><br/>
     <input type="text" name="name" id="name" /><br/>
     <label for="family">Monster's family :</label><br/>
     <!-- Familles -->
     <select name="family" id="family">
		<?php //creation du repertoire des familles
			for ($i = 0; $i < count($familyList); $i++) {
				echo "<option value='".$familyList[$i]->family_id()."'>".$familyList[$i]->name()."</option>";
			  }
		?>
	</select>
	<br/>
	 <!-- Couleur de cheveux -->
	 <label for="hair_color">Monster's hair color :</label>
	<br/>
	<input type="radio" name="hair_color" value="Red"> Red
	<input type="radio" name="hair_color" value="Blue"> Blue
	<input type="radio" name="hair_color" value="Yellow"> Yellow
	<input type="radio" name="hair_color" value="Green"> Green
	<input type="radio" name="hair_color" value="Black" checked> Black
	<br/>
	<!-- Type de peau -->
	<label for="skin_type">Monster's skin type :</label>
	<br/>
	<input type="radio" name="skin_type" value="White"> White
	<input type="radio" name="skin_type" value="Black" > Black
	<input type="radio" name="skin_type" value="Brown"> Brown
	<input type="radio" name="skin_type" value="Yellow"> Yellow
	<input type="radio" name="skin_type" value="Green" checked> Green
	<br/>
	<!-- Race -->
	<label for="hair_color">Monster's blood type :</label>
	<br/>
	<input type="radio" name="blood_type" value="Zombie"> Zombie
	<input type="radio" name="blood_type" value="Alien" checked> Alien
	<input type="radio" name="blood_type" value="Medusa"> Medusa
	<input type="radio" name="blood_type" value="Blob"> Blob
	<input type="radio" name="blood_type" value="Funnybear"> Funnybear
	<br/>
	<!-- Dents -->
	<label for="hair_color">Monster's teeth :</label>
	<br/>
	<input type="range" id="teeth" name="teeth" min="0" max="50" value="2" onchange="showValue(this.value)" />
	<span id="range">2</span>
	<br/>
	<!-- Photo -->
     
     <input type="file" name="photo" id="photo" /><br/>
     <input id ="submit" type="submit" name="submit" value="Send" />
</form>
<script>
	function showValue(newValue)
	{
		document.getElementById("range").innerHTML=newValue;
	}

	</script>
