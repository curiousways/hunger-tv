function setViewportHeight() {
	document.body.style.setProperty(
		"--viewport-height",
		window.innerHeight + "px"
	);
}

setViewportHeight();

window.addEventListener("resize", () => {
	setViewportHeight();
});
