export const navToggle = document.getElementById("drawer--nav__toggle");
export const navDrawer = document.getElementById("drawer--nav");
export const searchToggle = document.getElementById("drawer--search__toggle");
export const searchDrawer = document.getElementById("drawer--search");

navToggle.addEventListener("click", function () {
	this.classList.toggle("is-active");
	searchDrawer.classList.remove("open");
	navDrawer.classList.toggle("open");
	document.documentElement.classList.toggle("sm:no-scroll");
});

searchToggle.addEventListener("click", function () {
	this.classList.toggle("is-active");
	navToggle.classList.remove("is-active");
	navDrawer.classList.remove("open");
	searchDrawer.classList.toggle("open");

	setTimeout(() => {
		searchDrawer.querySelector("input").focus();
	}, 500); // Timeout required due to element not being visible on click
});

console.log("%cdrawer running", "color:green;");
