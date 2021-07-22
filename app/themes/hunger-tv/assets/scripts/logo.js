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

if (window.scrollY === 0) {
	container.classList.add("animate");

	window.addEventListener("scroll", () => {
		container.classList.add("visible");

		console.log(logo.querySelector("svg").getBoundingClientRect().top);

		if (logo.querySelector("svg").getBoundingClientRect().top <= 24) {
			logo.classList.add("top");
		}
	});

	if (sessionStorage.getItem("meal") == null) {
		// if (logo) logo.classList.add("animate");
		// sessionStorage.setItem("meal", "devoured");

		setTimeout(() => {
			if (logo) logo.classList.add("mini");
		}, 1500);
	} else if (logo) {
		logo.classList.add("mini");
	}
} else {
	container.classList.add("visible");
	if (logo) logo.classList.add("mini");
}

console.log("%clogo running", "color:green;");
