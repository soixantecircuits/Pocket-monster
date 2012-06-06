function click_world () {
	document.getElementById('lbl_name').innerHTML = "Name of the world : ";
	document.getElementById('world').style.visibility = "hidden";
	document.getElementById('familly').style.visibility = "hidden";
	document.getElementById('button_world').checked = true;
}

function click_familly () {
	document.getElementById('lbl_name').innerHTML = "Name of the familly : ";
	document.getElementById('world').style.visibility = "visible";
	document.getElementById('familly').style.visibility = "hidden";
	document.getElementById('button_familly').checked = true;
}

function click_monster () {
	document.getElementById('lbl_name').innerHTML = "Name of the monster : ";
	document.getElementById('world').style.visibility = "visible";
	document.getElementById('familly').style.visibility = "visible";
	document.getElementById('button_monster').checked = true;
}

function send_form () {
	if (document.getElementById('button_world').checked) {
		document.getElementById('form').action = 'admin/add_world.php';
	} else if (document.getElementById('button_familly').checked) {
		document.getElementById('form').action = 'admin/add_familly.php';
	} else {
		document.getElementById('form').action = 'admin/add_monster.php';
	}
	
	document.getElementById('form').submit();
}