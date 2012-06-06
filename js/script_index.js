// Called when a world is chosen
function choose_world (id) {
	update_world(id);
	document.getElementById('form').submit();
}

// Called after each action after a world has been chosen
function update_world (id) {
	var trs = document.getElementById('world_table').getElementsByTagName("tr");
	for (var i = 0; i < trs.length; i++) {
		if (i != id) {
			trs[i].removeChild(trs[i].getElementsByTagName("td")[0]);
		}
	}
	document.getElementById('world_form').value = id;

	var sheet = document.createElement('style')
	sheet.innerHTML = "body {background:url('" + trs[id].getElementsByTagName('img')[0].src + "') no-repeat;} ";
	document.body.appendChild(sheet);
}

// Called when a family is chosen
function choose_family (id, idF) {
	update_family(id, idF);
	document.getElementById('form').submit();
}

// Called after each action after a family has been chosen
function update_family (id, idF) {
	var trs = document.getElementById('family_table').getElementsByTagName("tr");
	for (var i = 0; i < trs.length; i++) {
		if (i != id) {
			trs[i].removeChild(trs[i].getElementsByTagName("td")[0]);
		}
	}
	document.getElementById('family_form').value = id;
	document.getElementById('family_id').value = idF;
}

// Called when a monster is chosen
function choose_monster (id, idM) {
	update_monster(id, idM);
	document.getElementById('form').submit();
}

// Called after each action after a monster has been chosen
function update_monster (id, idM) {
	var trs = document.getElementById('monster_table').getElementsByTagName("tr");
	for (var i = 0; i < trs.length; i++) {
		if (i != id) {
			trs[i].removeChild(trs[i].getElementsByTagName("td")[0]);
		}
	}
	document.getElementById('monster_form').value = id;
	document.getElementById('monster_id').value = idM;
}