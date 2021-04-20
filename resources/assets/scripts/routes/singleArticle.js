export default {
  init() {
    // JavaScript to be fired on the article page


  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];

  googletag.cmd.push(function() {
	googletag.defineSlot('/64193083/MPU_DMPU', [[300, 600], [300, 250]], 'div-gpt-ad-1529145788203-0').addService(googletag.pubads());
	googletag.pubads().enableSingleRequest();
	googletag.enableServices();
  });


  },
  finalize() {
    // JavaScript to be fired on the article page, after the init JS
  },
};
