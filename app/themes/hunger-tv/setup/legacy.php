<?php

// Legacy

define('HTV_LAST_V2_POST_ID', 86950);
define('HTV_LAST_V3_POST_ID', 228985);

// Handle legacy field groups
require __DIR__ . '/../hungertv-custom/hungertv-custom-article-acf-location-rule.php';

// Source: hunger-tv-legacy theme
function hungertv_parse_credits($credits, $wrap_in_aside=false) {
	$lines = "";
	
	if (strpos($credits, '@@@') !== false) {
		$lines = explode("\n", str_replace("\n\n", "\n", trim($credits)));
		
		for ($i = 0; $i < count($lines); $i++) {
			if (strpos($credits, '@@@') !== false && trim($lines[$i]) != "") {
				$lines[$i] = '<em>' . str_replace("@@@", '</em> ', $lines[$i]);
			}
		}
		
		if ($wrap_in_aside) {
			return '<aside class="credits" data-lines="' . count($lines) . '"><span>' . implode('<br>', $lines) . "</span></aside>";
		} else {
			return '<p class="credits">' . implode('<br>', $lines) . "</p>";
		}
	}
}

// Fix page 404s
// Source: hungertv-custom/hungertv-add-custom-post-types.php
global $wp_rewrite;
$wp_rewrite->page_structure = 'pages/%pagename%';
