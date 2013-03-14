
<?php foreach($dirs as $dir_name => $dir_disp_name) :?>

	<div class="item">
		<?php echo Html::anchor($dir_name, $dir_disp_name);?>
	</div>

<?php endforeach;?>

<div class="item">
	<?php echo Html::anchor('#', 'under construction...');?>
</div>


