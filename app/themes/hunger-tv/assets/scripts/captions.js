const captions = document.getElementsByClassName("caption");

if (captions.length) {
	const captionLineHeight = getComputedStyle(captions[0]).lineHeight; // Get .caption line height
	const captionLineHeightNum = parseInt(captionLineHeight, 10); // Convert to number for calculations
	const captionHeight = captionLineHeightNum * 2;

	captions.forEach((caption) => {
		if (caption.offsetHeight > captionHeight) {
			const button = document.createElement("button");
			button.innerHTML = "Show more";

			caption.style.height = captionHeight + "px";
			caption.classList.add("truncate");
			caption.parentNode.appendChild(button);

			button.addEventListener("click", () => {
				caption.style.height = "auto";
				caption.classList.remove("truncate");
				button.remove();
			});
		}
	});
}
