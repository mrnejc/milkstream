<?php require 'config.php' ?>
<?php require 'authen.php' ?>
<?php require 'function.php' ?>
<?php require 'top.php' ?>

<?php
$dirlist = browse();
$dirlist_count = count($dirlist);
?>

<h2>Library</h2>
<h4><?php echo singular_plural($dirlist_count, 'directory', 'directories')?></h4>
<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th>Directory</th>
		</tr>
	  </thead>
	  <tbody>
		<?php
			if ($dirlist_count > 0) {
				foreach ($dirlist as $dirname) {
					$query = get_http_query(array('dir' => $dirname));
					echo "<tr>";
					echo "<td><a href=\"browse.php?$query\">$dirname</a></td>";
					echo "</tr>";
				}
			}
			else {
				echo "<tr>";
				echo "<td>Please add files to the directory.</td>";
				echo "</tr>";
			}	
		?>
	  </tbody>
	</table>
</div>

<?php require 'bottom.php' ?>
