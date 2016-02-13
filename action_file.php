<?php
$meta = get_meta($filename);
$file_url = get_file_url($dirname, $filename);

$query = get_http_query(array('url' => $file_url, 'video_type' => $meta['type'], 'title' => $meta['title']));
$mvrl_url = "mvrl.php?$query";
if (is_android()) {
	$play_url = "milkvr://sideload/?$query";
}
else {
	$play_url = "$file_url\" target=\"blank";
}
?>

<a href="<?php echo $play_url ?>" class="btn btn-xs btn-success">Play</a>&nbsp;
<a href="<?php echo $mvrl_url ?>" class="btn btn-xs btn-warning">MVRL</a>