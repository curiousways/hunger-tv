const drawer = document.getElementById("drawer");
const toggle = document.getElementById("drawer__toggle");

toggle.addEventListener("click", function () {
	this.classList.toggle("is-active");
	drawer.classList.toggle("open");
	document.body.classList.toggle("wide");
});

console.log("%cdrawer running", "color:green;");
