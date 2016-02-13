<?php
function get_meta($filename) {
	list($title, $type, $ext) = explode('.', $filename);
	return array('title' => $title, 'type' => $type, 'ext' => $ext);
}

function get_title($filename) {
	return get_meta($filename)['title'];
}

function browse ($dirname='') {
	
	$media_dir = dirname(__FILE__) . '\media';
	$itemlist = scandir(join('/', array($media_dir, $dirname)));

	// remove . and ..
	unset($itemlist[0]);
	unset($itemlist[1]);
	
	return $itemlist;
}

function get_http_query($data) {
	return http_build_query ($data, '', '&', PHP_QUERY_RFC3986);
}

function singular_plural($number, $singular, $plural) {
	if ($number <= 1) return "$number $singular";
	else return "$number $plural";
}

function is_android() {
	return strpos($_SERVER['HTTP_USER_AGENT'], "Android") !== false;
}

function get_file_url($dirname, $filename) {
	global $BASE_URL;
	return "$BASE_URL/media/" . rawurlencode($dirname) . "/" . rawurlencode($filename);
}

?>