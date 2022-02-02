const captions = document.getElementsByClassName("caption");
const lineHeight = 18;

captions.forEach((caption) => {
	if (caption.offsetHeight > lineHeight * 2) {
		const button = document.createElement("button");
		button.innerHTML = "Show more";

		caption.style.height = lineHeight * 2 + "px";
		caption.style.overflow = "hidden";
		caption.parentNode.appendChild(button);

		button.addEventListener("click", () => {
			caption.style.height = "auto";
			button.remove();
		});
	}
});
