 <div class="hero-unit">
			 	<div class="page-header">
  				<h1>Choose your world</h1>
				</div>
			</div>
<div class="row">
	<div class="span5 offset5">
	<ul>
	   <?php 
			for ($i = 0; $i < count($worldList); $i++) {
				echo "<li class='btn'><a href='?page=family&&world_id=".$worldList[$i]->world_id()."'>".$worldList[$i]->world_name()."</a></li>";
			}
		?>
	</ul>
	</div>
</div>