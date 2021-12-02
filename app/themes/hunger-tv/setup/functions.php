<?php

// Return an asset's path
function _mghd_asset($path) {
	return trailingslashit(get_template_directory_uri()) . 'dist/assets/' . $path;
}
