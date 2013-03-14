
<?php foreach($dirs as $dir) :?>
	<div class="item">
		<?php echo $dir['dir_name'];?>
	</div>

	<?php foreach($dir['files'] as $file) :?>
		<div class="item">
			<?php echo $file;?>
		</div>
	<?php endforeach;?>

<?php endforeach;?>

<?php foreach($files as $file) :?>
	<div class="item">
		<?php echo $file;?>
	</div>
<?php endforeach;?>
