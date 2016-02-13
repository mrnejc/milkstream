<?php require 'config.php' ?>
<?php require 'authen.php' ?>
<?php require 'function.php' ?>
<?php require 'top.php' ?>

<?php
// Format keywords
$keywords_raw = $_GET['kw'];
$keywords = array();
foreach (explode(' ', $keywords_raw) as $keyword) {
	if ($keyword !== '') $keywords[] = strtolower($keyword);
}

// Search
$result = array('dirlist' => array(), 'filelist' => array());
$result_count = 0;
$dirlist = browse();
foreach ($dirlist as $dirname) {
	$filelist = browse($dirname);
	foreach ($filelist as $filename) {
		// Match title
		list($title, $type, $ext) = explode(".", $filename);
		$is_matched = true;
		foreach ($keywords as $keyword) {
			if (strpos(strtolower($title), $keyword) === false) {
				$is_matched = false;
				break;
			}
		}
		if ($is_matched) {
			$result['dirlist'][] = $dirname;
			$result['filelist'][] = $filename;
			$result_count++;
		}
	}
}

// Sort result
array_multisort($result['filelist'], $result['dirlist']);
?>

<h2>Search Result</h3>
<h4><?php echo "\"$keywords_raw\" : " . singular_plural($result_count, 'file', 'files')?></h4>
<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th>Title</th>
		  <th>&nbsp;</th>
		  <th>Action</th>
		</tr>
	  </thead>
	  <tbody>
		<?php
			if ($result_count > 0) {
				for ($i = 0; $i < $result_count; $i++) {
					$dirname = $result['dirlist'][$i];
					$filename = $result['filelist'][$i];
				
					$title = get_title($filename);
					echo "<tr>";
					echo "<td>$title</td>";
					echo "<td><span class=\"label label-default\">$dirname</span></td>";
					echo "<td>";
					require 'action_file.php';
					echo "</td>";
					echo "</tr>";
				}
			}
			else {
				echo "<tr>";
				echo "<td>No result</td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "</tr>";
			}	
		?>
	  </tbody>
	</table>
</div>

<?php require 'bottom.php' ?>
