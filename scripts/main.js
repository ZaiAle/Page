$(document).ready(function() { 
	$('#roll_open').css('display', 'block');
	$('#roll_open_pytania').css('display', 'block');
});

var scrollpos_1 = window.pageYOffset;
window.onscroll = function () {
	if (window.innerWidth < 768) {
		var scrollpos_2 = window.pageYOffset;
		if (scrollpos_1 > scrollpos_2) {
			document.getElementById("pyt_button").style.opacity = "1";
			document.getElementById("akt_button").style.opacity = "1";
		} else {
			document.getElementById("pyt_button").style.opacity = "0";
			document.getElementById("akt_button").style.opacity = "0";
		}
		scrollpos_1 = scrollpos_2;
	}
}

var root = document.querySelector(':root');
var roots = getComputedStyle(root);

var white = roots.getPropertyValue('--background_color');

var fontwhite = roots.getPropertyValue('--background_color_font');
var Dfontgreen = roots.getPropertyValue('--green_font_dark');

var Lgreen = roots.getPropertyValue('--green_accent_light');
var Dgreen = roots.getPropertyValue('--green_accent_dark');

var Lred = roots.getPropertyValue('--red_accent_light');
var Dred = roots.getPropertyValue('--red_accent_dark');

var green = roots.getPropertyValue('--yes_box');
var red = roots.getPropertyValue('--no_box');
var blue = roots.getPropertyValue('--link');

const autoDark = window.matchMedia("(prefers-color-scheme: dark)");
if (autoDark.matches) {
	darkMode();
} else {
	lightMode();
}

function darkMode() {
	root.style.setProperty('--background_color', 'rgb(26, 31, 31)');

	root.style.setProperty('--background_color_font', 'rgb(199, 209, 205)');
	root.style.setProperty('--green_font_dark', 'rgb(209, 224, 218)');

	root.style.setProperty('--green_accent_light', 'rgb(104, 39, 66)');
	root.style.setProperty('--green_accent_dark', 'rgb(74, 28, 47)');

	root.style.setProperty('--red_accent_light', 'rgb(111, 42, 71)');
	root.style.setProperty('--red_accent_dark', 'rgb(192, 89, 132)');

	root.style.setProperty('--yes_box', 'rgb(115, 191, 162)');
	root.style.setProperty('--no_box', 'rgb(149, 80, 114)');
	root.style.setProperty('--link', 'rgb(140, 213, 255)');

	document.getElementById("dark_mode_btn").style.display = "none";
	document.getElementById("light_mode_btn").style.display = "block";
}

function lightMode() {
	root.style.setProperty('--background_color', white);

	root.style.setProperty('--background_color_font', fontwhite);
	root.style.setProperty('--green_font_dark', Dfontgreen);

	root.style.setProperty('--green_accent_light', Lgreen);
	root.style.setProperty('--green_accent_dark', Dgreen);

	root.style.setProperty('--red_accent_light', Lred);
	root.style.setProperty('--red_accent_dark', Dred);

	root.style.setProperty('--yes_box', green);
	root.style.setProperty('--no_box', red);
	root.style.setProperty('--link', blue);

	document.getElementById("light_mode_btn").style.display = "none";
	document.getElementById("dark_mode_btn").style.display = "block";
}

function open_aktualnosci() {
	if (window.innerWidth < 414) {
		document.getElementById("aktualnosci_sidebar").style.width = "300px";
		document.getElementById("roll_open").style.marginRight = "300px";
		setTimeout(function () { document.getElementById("posty").style.opacity = "1" }, 800);

	} else if (window.innerWidth < 768 && window.innerWidth >= 414) {
		document.getElementById("aktualnosci_sidebar").style.width = "400px";
		document.getElementById("roll_open").style.marginRight = "400px";
		setTimeout(function () { document.getElementById("posty").style.opacity = "1" }, 800);
	} else {
		document.getElementById("aktualnosci_sidebar").style.width = "700px";
		document.getElementById("roll_open").style.marginRight = "700px";
		setTimeout(function () { document.getElementById("posty").style.opacity = "1" }, 800);
	}
} 

function close_aktualnosci() {
	setTimeout(function () { document.getElementById("aktualnosci_sidebar").style.width = "0" }, 400);
	setTimeout(function () { document.getElementById("roll_open").style.marginRight = "0" }, 400);
	document.getElementById("posty").style.opacity = "0";
}

function open_pytania() {
	if (window.innerWidth < 414) {
		document.getElementById("pytania_sidebar").style.width = "300px";
		document.getElementById("roll_open_pytania").style.marginLeft = "300px";
		setTimeout(function () { document.getElementById("disappearing_act").style.opacity = "1" }, 800);

	} else if (window.innerWidth < 768 && window.innerWidth >= 414) {
		document.getElementById("pytania_sidebar").style.width = "400px";
		document.getElementById("roll_open_pytania").style.marginLeft = "400px";
		setTimeout(function () { document.getElementById("disappearing_act").style.opacity = "1" }, 800);

	} else {
		document.getElementById("pytania_sidebar").style.width = "700px";
		document.getElementById("roll_open_pytania").style.marginLeft = "700px";
		setTimeout(function () { document.getElementById("disappearing_act").style.opacity = "1" }, 800);
	}
}

function close_pytania() {
	setTimeout(function () { document.getElementById("pytania_sidebar").style.width = "0" }, 400);
	setTimeout(function () { document.getElementById("roll_open_pytania").style.marginLeft = "0" }, 400);
	document.getElementById("disappearing_act").style.opacity = "0";
}


function phone_function() {
	var user_phone = document.getElementById("user_phone");
	user_phone.addEventListener('keyup', function () {
		var phone_value = user_phone.value;
		var output;
		phone_value = phone_value.replace(/\D+/g, '');
		var prt1 = phone_value.substr(0, 3);
		var prt2 = phone_value.substr(3, 3);
		var prt3 = phone_value.substr(6, 3);
		if (prt1.length < 3) {
			output = prt1;
		} else if (prt1.length == 3 && prt2.length < 3) {
			output = prt1 + " - " + prt2;
		} else if (prt1.length == 3 && prt2.length == 3) {
			output = prt1 + " - " + prt2 + " - " + prt3;
		}
		user_phone.value = output;
		console.log(output);
	});
}
