<?php

function clean_path($path) {
	return str_replace(array('..', '/', '\\'), '', $path);
}

function get_meta($filename) {
	list($title, $type, $ext) = explode('.', $filename);
	return array('title' => $title, 'type' => $type, 'ext' => $ext);
}

function browse ($dirname='') {
	$media_dir = get_media_dir();
	$path = $dirname?join('/', array($media_dir, $dirname)):$media_dir;

	$itemlist = scandir($path);

	// filter the result
	$keepdirs = strcmp($media_dir, $path) === 0;
	$max = count($itemlist);
	for($i=0; $i<$max; $i++) {
		// remove *UX dot aka "hidden files"; will also remove . and ..
		if(strpos($itemlist[$i], '.') === 0) {
			unset($itemlist[$i]);
			continue;
		}

		// don't want files in root && don't want dirs in media dirs
		if(!is_file(join('/', array($path, $itemlist[$i]))) xor $keepdirs)
			unset($itemlist[$i]);
        }

	return $itemlist;
}

function get_media_dir() {
	return dirname(__FILE__) . '/media';
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

function get_file_path($dirname, $filename) {
	$dirname = clean_path($dirname);
	$filename = clean_path($filename);
	return get_media_dir() . "\\$dirname\\$filename";
}

function filesize64($file)
{
    static $iswin;
    if (!isset($iswin)) {
        $iswin = (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN');
    }

    static $exec_works;
    if (!isset($exec_works)) {
        $exec_works = (function_exists('exec') && !ini_get('safe_mode') && @exec('echo EXEC') == 'EXEC');
    }

    // try a shell command
    if ($exec_works) {
        $cmd = ($iswin) ? "for %F in (\"$file\") do @echo %~zF" : "stat -c%s \"$file\"";
        @exec($cmd, $output);
        if (is_array($output) && ctype_digit($size = trim(implode("\n", $output)))) {
            return $size;
        }
    }

    // try the Windows COM interface
    if ($iswin && class_exists("COM")) {
        try {
            $fsobj = new COM('Scripting.FileSystemObject');
            $f = $fsobj->GetFile( realpath($file) );
            $size = $f->Size;
        } catch (Exception $e) {
            $size = null;
        }
        if (ctype_digit($size)) {
            return $size;
        }
    }

    // if all else fails
    return filesize($file);
}
?>
