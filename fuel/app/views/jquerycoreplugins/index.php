
<?php foreach($dirs as $dir) :?>

	<div class="item">
		<?php echo $dir['dir_name'];?>
	</div>

	<?php foreach($dir['files'] as $file) :?>

		<div class="item">
			<?php echo Form::open(array('action' => 'common/download'))?>
			<?php echo Form::hidden('file_name', $file['file_name'])?>
			<?php echo Form::hidden('file_path', $file['file_path'])?>
			<?php echo $file['file_name'];?>
			<?php echo Form::submit('submit', 'Download')?>
			<?php echo Form::close();?>
			<?php //echo Html::anchor($file['file_path'], $file['file_name'])?>
		</div>

	<?php endforeach;?>

<?php endforeach;?>


<?php foreach($files as $file) :?>

	<div class="item">
		<?php echo Form::open(array('action' => 'common/download'))?>
		<?php echo Form::hidden('file_name', $file['file_name'])?>
		<?php echo Form::hidden('file_path', $file['file_path'])?>
		<?php echo $file['file_name'];?>
		<?php echo Form::submit('submit', 'Download')?>
		<?php echo Form::close();?>
		<?php //echo Html::anchor($file['file_path'], $file['file_name'])?>
	</div>

<?php endforeach;?>
