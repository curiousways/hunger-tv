const captions = document.getElementsByClassName("caption");

captions.forEach((caption) => {
	if (caption.offsetHeight > 36) {
		const button = document.createElement("button");
		button.innerHTML = "Show more";

		caption.style.height = "36px";
		caption.style.overflow = "hidden";
		caption.parentNode.appendChild(button);

		button.addEventListener("click", () => {
			caption.style.height = "auto";
		});
	}
});
