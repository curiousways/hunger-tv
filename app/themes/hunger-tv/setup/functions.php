<?php

// Return an asset's path
function asset($path) {
	return trailingslashit(get_template_directory_uri()) . 'dist/assets/' . $path;
}
