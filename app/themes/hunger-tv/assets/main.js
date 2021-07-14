// Scripts
import "./scripts/carousel";
import "./scripts/drawer";
import "./scripts/logo";

// Styles
import "./main.scss";

document.documentElement.classList.remove("no-js");
document.documentElement.setAttribute("data-useragent", navigator.userAgent);
document.body.style.setProperty("--height", window.innerHeight + "px");
