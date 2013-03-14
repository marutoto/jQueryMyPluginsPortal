
<?php foreach($dirs as $dir) :?>

	<div class="item dir">
		<?php echo $dir['dir_name'];?>
	</div>

	<?php foreach($dir['files'] as $file) :?>

		<?php echo Form::open()?>
		<div class="item file">
			<div class="left">
				<?php echo Form::hidden('file_name', $file['file_name'])?>
				<?php echo Form::hidden('file_path', $file['file_path'])?>
				<?php echo $file['file_name'];?>
			</div>
			<div class="right">
				<?php echo Form::submit('submit', 'Download')?>
			</div>
		</div>
		<?php echo Form::close();?>

	<?php endforeach;?>

<?php endforeach;?>


<?php foreach($files as $file) :?>

	<?php echo Form::open()?>
	<div class="item dir">
		<div class="left">
			<?php echo Form::hidden('file_name', $file['file_name'])?>
			<?php echo Form::hidden('file_path', $file['file_path'])?>
			<?php echo $file['file_name'];?>
		</div>
		<div class="right">
			<?php echo Form::submit('submit', 'Download')?>
		</div>
	</div>
	<?php echo Form::close();?>

<?php endforeach;?>

<div id="end">
<?php echo Html::anchor('portals', 'Back');?>
</div>
