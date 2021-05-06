const drawer = document.getElementById("drawer");
const toggle = document.getElementById("drawer__toggle");

toggle.addEventListener("click", function () {
	document.body.classList.toggle("wide");
	drawer.classList.toggle("open");
});

console.log("%cdrawer running", "color:green;");
