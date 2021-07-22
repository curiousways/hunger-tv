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

if (window.scrollY == 0 && sessionStorage.getItem("meal") == null) {
	container.classList.add("animate");
	sessionStorage.setItem("meal", "devoured");

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
