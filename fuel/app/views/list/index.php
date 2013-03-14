
<?php foreach($dirs as $dir) :?>

	<div class="item dir">
		<?php echo $dir['dir_name'];?>
	</div>

	<?php foreach($dir['files'] as $file) :?>

		<div class="item file">
			<?php echo Form::open()?>
			<?php echo Form::hidden('file_name', $file['file_name'])?>
			<?php echo Form::hidden('file_path', $file['file_path'])?>
			<?php echo $file['file_name'];?>
			<?php echo Form::submit('submit', 'Download')?>
			<?php echo Form::close();?>
		</div>

	<?php endforeach;?>

<?php endforeach;?>


<?php foreach($files as $file) :?>

	<div class="item file">
		<?php echo Form::open()?>
		<?php echo Form::hidden('file_name', $file['file_name'])?>
		<?php echo Form::hidden('file_path', $file['file_path'])?>
		<?php echo $file['file_name'];?>
		<?php echo Form::submit('submit', 'Download')?>
		<?php echo Form::close();?>
	</div>

<?php endforeach;?>

<div id="end">
<?php echo Html::anchor('portals', 'Back');?>
</div>
