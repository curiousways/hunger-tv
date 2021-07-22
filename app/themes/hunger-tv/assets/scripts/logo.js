const container = document.querySelector(".header__bar");
const logo = document.querySelector(".hero__logo");
const svg = logo.querySelector("svg");

// Source: https://css-tricks.com/books/greatest-css-tricks/scroll-animation/
window.addEventListener(
	"scroll",
	() => {
		document.body.style.setProperty("--scroll", window.pageYOffset);
	},
	false
);

if (window.scrollY === 0) {
	container.classList.add("animate");

	window.addEventListener("scroll", () => {
		logo.classList.add("animating");

		if (svg.getBoundingClientRect().top <= 24) {
			logo.classList.add("fixed");
			container.classList.add("visible");
		}
	});

	if (sessionStorage.getItem("meal") == null) {
		// if (logo) logo.classList.add("animate");
		// sessionStorage.setItem("meal", "devoured");
		// setTimeout(() => {
		// 	if (logo) logo.classList.add("mini");
		// }, 1500);
	} else if (logo) {
		container.classList.add("visible");
		logo.classList.add("fixed");
	}
} else {
	container.classList.add("visible");
	if (logo) logo.classList.add("fixed");
}

console.log("%clogo running", "color:green;");
