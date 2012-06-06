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
}

function choose_family (id) {
	update_family(id);
	document.getElementById('form').submit();
}

function update_family (id) {
	var trs = document.getElementById('family').getElementsByTagName("tr");
	for (var i = 0; i < trs.length; i++) {
		if (i != id) {
			trs[i].removeChild(trs[i].getElementsByTagName("td")[0]);
		}
	}
	document.getElementById('family_form').value = id;
}