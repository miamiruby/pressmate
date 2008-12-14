<div class="contents form">
<?php echo $form->create('Content');?>
	<fieldset>
 		<legend><?php __('Edit Content');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('body');
		echo $form->input('Category');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>