document
	.getElementById("drawer--nav__toggle")
	.addEventListener("click", function () {
		this.classList.toggle("is-active");
		document.getElementById("drawer--nav").classList.toggle("open");
		document.body.classList.toggle("wide");
	});

document
	.getElementById("drawer--search__toggle")
	.addEventListener("click", function () {
		this.classList.toggle("is-active");
		document.getElementById("drawer--search").classList.toggle("open");
		document.body.classList.toggle("wide");
	});

console.log("%cdrawer running", "color:green;");
