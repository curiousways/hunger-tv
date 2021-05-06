import slick from "slick-carousel";
import "slick-carousel/slick/slick.scss";

jQuery(".carousel").slick({
	speed: 500,
	cssEase: "cubic-bezier(0.4, 0, 0.2, 1)",
	touchThreshold: 10,
});

console.log("%ccarousel running", "color:green;");
