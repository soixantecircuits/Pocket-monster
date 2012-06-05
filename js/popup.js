
	popup=document.getElementById("popup");
		h=0;
		function popupgrowup() {
			h+=5;
			popup.style.height=h+"px";
			if (h<70){
			setTimeout("popupgrowup()",30)
			}
			else {
				setTimeout("window.location.replace('admin.php');",2000);
			}
		}
