<?php require 'config.php' ?>
<?php require 'authen.php' ?>
<?php require 'function.php' ?>
<?php
	$file_path = get_file_path($_GET['dir'], $_GET['file']);
	ob_end_clean();
	if (file_exists($file_path)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize64($file_path));
		readfile($file_path);
		exit;
	}
?>