// Source: https://css-tricks.com/books/greatest-css-tricks/scroll-animation/
window.addEventListener(
	"scroll",
	() => {
		document.body.style.setProperty("--scroll", window.pageYOffset);
	},
	false
);

console.log("%clogo running", "color:green;");
