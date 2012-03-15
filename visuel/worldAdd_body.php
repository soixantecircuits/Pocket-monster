<div class="hero-unit">
  <h1> World </h1>
</div>

<form  class="span4 offset4" method="post" action="admin.php?page=world" enctype="multipart/form-data">
     <label for="name">World's name :</label><br/>
     <input type="text" name="name" id="name" /><br/>
	<!-- Photo -->
     <label for="photo">Put a picture</label>
     <input type="file" name="photo" id="photo" /><br/>
     
     <input class="btn" id ="submit" type="submit" name="submit" value="Send" />
     <a class="btn" href="admin.php">Cancel</a>
</form>
<script>
	function showValue(newValue)
	{
		document.getElementById("range").innerHTML=newValue;
	}
</script>
