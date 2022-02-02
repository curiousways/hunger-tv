const captions = document.getElementsByClassName("caption");

captions.forEach((caption) => {
	if (caption.offsetHeight > 36) {
		caption.style.height = "36px";
	}
});
