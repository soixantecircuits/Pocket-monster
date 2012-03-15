 <div class="row">
    <div class="span3">
      <h1><?php echo $monsterDetails["monster_name"]; ?></h1>
      <img src="<?php echo $monsterDetails["monster_photo_link"];?>"> 
      <h1> Family : </h1>
      <img src="<?php echo $monsterDetails["family_photo_link"];?>"> 

    </div>
    <div class="span9">
      <table class="table table-striped table-bordered table-condensed">
	  	<tr>
	  		<th>Hair color</th>
  		</tr>
  		<tr>
	  		<td><?php echo $monsterDetails["monster_hair_color"]?></td>
  		</tr>
  		<tr>
	  		<th>Skin type</th>
  		</tr>
  		<tr>
	  		<td><?php echo $monsterDetails["monster_skin_type"]?></td>
  		</tr>
  		<tr>
	  		<th>Blood type</th>
  		</tr>
  		<tr>
	  		<td><?php echo $monsterDetails["monster_blood_type"]?></td>
  		</tr>
  		<tr>
	  		<th>Teeth</th>
  		</tr>
  		<tr>
	  		<td><?php echo $monsterDetails["monster_teeth"]?></td>
  		</tr>
	</table>

   <table class="table table-striped table-bordered table-condensed">
      <tr>
        <th>Family name</th>
      </tr>
      <tr>
        <td><?php echo $monsterDetails["family_name"]?></td>
      </tr>
      <tr>
        <th>Family members</th>
      </tr>
      <tr>
        <td><?php echo $familyRatio["ratio"];?></td>
      </tr>
  </table>

  
    </div>
    <div class="span12"style="margin-top:5em;text-align:center;" >
    <h1>World</h1>
         <table class="table table-striped table-bordered table-condensed" >
      <tr>
        <th>World name</th>
      </tr>
      <tr>
        <td><?php echo $monsterDetails["world_name"]?></td>
      </tr>
      <tr>
        <th>Familys</th>
      </tr>
      <tr>
        <td><?php echo $worldFamilyNumbers?></td>
      </tr>
        </table>
    </div>
  </div>