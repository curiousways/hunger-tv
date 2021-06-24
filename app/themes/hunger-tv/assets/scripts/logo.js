// Source: https://css-tricks.com/books/greatest-css-tricks/scroll-animation/
window.addEventListener(
	"scroll",
	() => {
		document.body.style.setProperty("--scroll", window.pageYOffset);
	},
	false
);

window.addEventListener("scroll", () => {
	if (window.scrollY > 0) {
		document.querySelector(".header__bar").classList.add("visible");
	} else {
		document.querySelector(".header__bar").classList.remove("visible");
	}
});

console.log("%clogo running", "color:green;");
