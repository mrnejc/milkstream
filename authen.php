<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="MilkStream"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Unauthorized';
    exit;
} else {
    if (($_SERVER['PHP_AUTH_USER'] !== $USERNAME) or
    	($_SERVER['PHP_AUTH_PW'] !== $PASSWORD)) {
    	echo 'Unauthorized : Invalid username or password';
    	exit;
    }
}
?>