<?php require 'config.php' ?>
<?php require 'authen.php' ?>
<?php require 'function.php' ?>
<?php
	$url = $_GET['url'];
	$video_type = $_GET['video_type'];
	$title = $_GET['title'];

	header("Content-type: video/mvrl");
	header("Content-Disposition: attachment; filename=$title.mvrl");

	echo $url . "\r\n";
	echo $video_type;
 ?>