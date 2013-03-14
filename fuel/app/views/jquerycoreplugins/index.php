
<?php /*foreach($plugins as $plugin) :?>
	<div class="item">
		<a href=""><?php echo $plugin;?></a>
	</div>
<?php endforeach;*/?>

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

<?php foreach($dirs as $dir) :?>
	<div class="item">
		<?php echo $item;?>
	</div>
<?php endforeach;?>
