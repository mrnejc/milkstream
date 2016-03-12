<?php require 'config.php' ?>
<?php require 'authen.php' ?>
<?php require 'function.php' ?>
<?php require 'top.php' ?>

<?php
// remove dangerous character
$dirname = clean_path($_GET['dir']);
$filelist = browse($dirname);
$filelist_count = count($filelist);
?>

<h2><?php echo $dirname ?></h2>
<h4><?php echo singular_plural($filelist_count, 'file', 'files')?></h4>
<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th>Title</th>
		  <th>Action</th>
		</tr>
	  </thead>
	  <tbody>
		<?php
			if ($filelist_count > 0) {
				foreach ($filelist as $filename) {
					echo "<tr>";
					echo "<td>";
					
					$title = get_meta($filename)['title'];
					
					// look for label
					$label_pos = strpos($title, " - ");
					if ($label_pos !== false) {
						$label = substr($title, 0, $label_pos);
						$title = substr($title, $label_pos + 3);
						echo "<span class=\"label label-default\">$label</span>&nbsp";
					}
					
					echo "$title</td>";
					echo "<td>";
					require 'action_file.php';
					echo "</td>";
					echo "</tr>";
				}
			}
			else {
				echo "<tr>";
				echo "<td>Please add directories to the library.</td>";
				echo "<td></td>";
				echo "</tr>";
			}	
		?>
	  </tbody>
	</table>
</div>
	  
<?php require 'bottom.php' ?>
