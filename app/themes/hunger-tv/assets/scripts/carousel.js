import slick from "slick-carousel";
import "slick-carousel/slick/slick.scss";

jQuery(".carousel--full .carousel__tray").slick({
	prevArrow: false,
	nextArrow: ".carousel--full .carousel__control--next",
	speed: 500,
	cssEase: "cubic-bezier(0.4, 0, 0.2, 1)",
	touchThreshold: 10,
	variableWidth: true,
	responsive: [
		{
			breakpoint: 768,
			settings: {
				variableWidth: false,
			},
		},
	],
});

jQuery(".carousel--full .carousel__tray").on(
	"init reInit afterChange",
	function (event, slick, currentSlide, nextSlide) {
		// currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
		var i = (currentSlide ? currentSlide : 0) + 1;
		jQuery(".carousel__counter .current").text(i);
	}
);

jQuery(".carousel--legacy .carousel__tray").slick({
	prevArrow: ".carousel--legacy .carousel__control--prev",
	nextArrow: ".carousel--legacy .carousel__control--next",
	speed: 500,
	cssEase: "cubic-bezier(0.4, 0, 0.2, 1)",
	touchThreshold: 10,
});

console.log("%ccarousel running", "color:green;");
