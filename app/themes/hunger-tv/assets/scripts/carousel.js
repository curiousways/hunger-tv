import slick from "slick-carousel";
import "slick-carousel/slick/slick.scss";

jQuery(".carousel").each(function () {
	var carousel = jQuery(this);

	carousel.find(".carousel__tray").slick({
		prevArrow: carousel.find(".carousel__control--prev"),
		nextArrow: carousel.find(".carousel__control--next"),
		speed: 500,
		cssEase: "cubic-bezier(0.4, 0, 0.2, 1)",
		touchThreshold: 10,
		variableWidth: true,
		// centerMode: true,
		asNavFor: carousel.find(".carousel__captions"),
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					variableWidth: false,
				},
			},
		],
	});

	carousel.find(".carousel__captions").slick({
		arrows: false,
		fade: true,
		asNavFor: carousel.find(".carousel__tray"),
	});

	carousel
		.find(".carousel__tray")
		.on(
			"init reInit afterChange",
			function (event, slick, currentSlide, nextSlide) {
				// currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
				var i = (currentSlide ? currentSlide : 0) + 1;
				carousel.find(".carousel__counter .current").text(i);
			}
		);
});

console.log("%ccarousel running", "color:green;");
