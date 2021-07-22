const container = document.querySelector(".header__bar");
const logo = document.querySelector(".hero__logo");

// Source: https://css-tricks.com/books/greatest-css-tricks/scroll-animation/
window.addEventListener(
	"scroll",
	() => {
		document.body.style.setProperty("--scroll", window.pageYOffset);
	},
	false
);

function setCookie(name, value, days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(";");
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == " ") c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

function eraseCookie(name) {
	document.cookie =
		name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}

if (window.scrollY == 0 && getCookie("meal") == null) {
	container.classList.add("animate");
	// sessionStorage.setItem("meal", "devoured");
	setCookie("meal", "devoured", 1);

	window.addEventListener("scroll", () => {
		logo.classList.add("animating");

		if (logo.querySelector("svg").getBoundingClientRect().top <= 24) {
			logo.classList.add("fixed");
			container.classList.add("visible");
		}
	});
} else {
	container.classList.add("visible");
	if (logo) logo.classList.add("fixed");
}

console.log("%clogo running", "color:green;");
