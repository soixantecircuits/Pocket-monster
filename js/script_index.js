function choose_world (id) {
	update_world(id);
	document.getElementById('form').submit();
}

function update_world (id) {
	var tbl = document.getElementById('world_table');
	var trs = tbl.getElementsByTagName("tr");
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

function choose_family (id, idF) {
	update_family(id, idF);
	document.getElementById('form').submit();
}

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