
// import external dependencies
import 'jquery';

import 'slick-carousel/slick/slick.min.js';
import TweenMax from 'gsap/src/uncompressed/TweenMax'; // eslint-disable-line
import ScrollMagic from 'scrollmagic'; // eslint-disable-line
import 'imports?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap'

//import 'infinite-scroll/dist/infinite-scroll.pkgd.js'; // eslint-disable-line


// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import singleArticle from './routes/singleArticle';


/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  // Article builder page, note the change from about-us to aboutUs.
  singleArticle,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
