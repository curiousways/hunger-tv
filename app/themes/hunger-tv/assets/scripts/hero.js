function setViewportHeight() {
	document.body.style.setProperty("--height", window.innerHeight + "px");
}

setViewportHeight();

window.addEventListener("resize", () => {
	setViewportHeight();
});
