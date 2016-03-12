<?php
$meta = get_meta($filename);
$file_url = get_file_url($dirname, $filename);

$query = get_http_query(array(
	'dir' => $dirname,
	'file' => $filename,
	'url' => $file_url,
	'video_type' => $meta['type'],
	'title' => $meta['title']
));

$play_url = is_android() ? "milkvr://sideload/?$query" : "$file_url\" target=\"blank";
$mvrl_url = "mvrl.php?$query";
$download_url = "download.php?$query"
?>

<a href="<?php echo $play_url ?>" class="btn btn-xs btn-success glyphicon glyphicon-play"></a>&nbsp;
<a href="<?php echo $mvrl_url ?>" class="btn btn-xs btn-warning glyphicon glyphicon-link"></a>&nbsp;
<a href="<?php echo $download_url ?>" class="btn btn-xs btn-info glyphicon glyphicon-cloud-download"></a>