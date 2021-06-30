const container = document.querySelector(".header__bar");
const logo = document.querySelector(".hero__logo");

// Source: https://css-tricks.com/books/greatest-css-tricks/scroll-animation/
// window.addEventListener(
// 	"scroll",
// 	() => {
// 		document.body.style.setProperty("--scroll", window.pageYOffset);
// 	},
// 	false
// );

if (window.scrollY === 0) {
	container.classList.add("animate");
	if (logo) logo.classList.add("animate");

	window.addEventListener("scroll", () => {
		container.classList.add("visible");
	});

	setTimeout(() => {
		if (logo) logo.classList.add("mini");
	}, 1500);
} else {
	container.classList.add("visible");
	if (logo) logo.classList.add("mini");
}

console.log("%clogo running", "color:green;");
