import { setCookie, getCookie } from "./functions";
const container = document.querySelector(".header__bar");
const logo = document.querySelector(".hero__logo");
const logoHeight = logo.querySelector("svg").getBoundingClientRect().height;
const logoOffset = 24;

// Source: https://css-tricks.com/books/greatest-css-tricks/scroll-animation/
window.addEventListener(
	"scroll",
	() => {
		document.body.style.setProperty("--scroll", window.pageYOffset);
	},
	false
);

if (window.scrollY == 0 && getCookie("meal") == null) {
	container.classList.add("animate");

	window.addEventListener("scroll", () => {
		logo.classList.add("animating");

		if (
			logo.querySelector("svg").getBoundingClientRect().top <= logoOffset
		) {
			logo.classList.add("fixed");
			container.classList.add("visible");
			// setCookie("meal", "devoured", 1);
		}

		if (window.scrollY <= logoHeight - logoOffset) {
			logo.classList.remove("fixed");
			container.classList.remove("visible");
		}
	});
} else {
	container.classList.add("visible");
	if (logo) logo.classList.add("fixed");
}

console.log("%clogo running", "color:green;");
