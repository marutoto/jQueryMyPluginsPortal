
<?php foreach($dirs as $dir => $dir_name) :?>

	<div class="item">
		<?php echo Html::anchor($dir, $dir_name);?>
	</div>

<?php endforeach;?>

<div class="item">
	<?php echo Html::anchor('#', 'under construction...');?>
</div>


