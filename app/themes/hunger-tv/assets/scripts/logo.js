// Source: https://css-tricks.com/books/greatest-css-tricks/scroll-animation/
// window.addEventListener(
// 	"scroll",
// 	() => {
// 		document.body.style.setProperty("--scroll", window.pageYOffset);
// 	},
// 	false
// );

window.addEventListener("scroll", () => {
	if (window.scrollY > 0) {
		document.querySelector(".header__bar").classList.add("visible");
		document.querySelector(".hero__logo").classList.add("mini");
	} else {
		document.querySelector(".header__bar").classList.remove("visible");
		document.querySelector(".hero__logo").classList.remove("mini");
	}
});

console.log("%clogo running", "color:green;");
