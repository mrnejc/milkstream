<?php
$query = get_http_query(array('dir' => $dirname));
$browse_url = "browse.php?$query";
?>

<a href="<?php echo $browse_url ?>" class="btn btn-xs btn-success glyphicon glyphicon-folder-open" style="width:40px;"></a>