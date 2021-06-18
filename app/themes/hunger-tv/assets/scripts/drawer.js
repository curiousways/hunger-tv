const drawer = document.getElementById("drawer--nav");
const toggle = document.getElementById("drawer--nav__toggle");

toggle.addEventListener("click", function () {
	this.classList.toggle("is-active");
	drawer.classList.toggle("open");
	document.body.classList.toggle("wide");
});

console.log("%cdrawer running", "color:green;");
