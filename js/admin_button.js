function click_world () {
	document.getElementById('lbl_name').innerHTML = "Name of the world : ";
	document.getElementById('world').style.visibility = "hidden";
	document.getElementById('family').style.visibility = "hidden";
	document.getElementById('button_world').checked = true;
}

function click_family () {
	document.getElementById('lbl_name').innerHTML = "Name of the family : ";
	document.getElementById('world').style.visibility = "visible";
	document.getElementById('family').style.visibility = "hidden";
	document.getElementById('button_family').checked = true;
}

function click_monster () {
	document.getElementById('lbl_name').innerHTML = "Name of the monster : ";
	document.getElementById('world').style.visibility = "visible";
	document.getElementById('family').style.visibility = "visible";
	document.getElementById('button_monster').checked = true;
}

function send_form () {
	if (document.getElementById('button_world').checked) {
		document.getElementById('form').action = 'admin/img_world.php';
	} else if (document.getElementById('button_family').checked) {
		document.getElementById('form').action = 'admin/img_family.php';
	} else {
		document.getElementById('form').action = 'admin/img_monster.php';
	}
	
	document.getElementById('form').submit();
}