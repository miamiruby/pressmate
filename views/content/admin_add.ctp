<div class="contents form">
<?php echo $form->create('Content', array('url' => '/admin/content/add'));?>
	<fieldset>
 		<legend><?php __('Add Content');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('body');
		echo $form->input('status_id');
		echo $form->input('commentable');
		echo $form->input('redirect_code');
		echo $form->input('redirect_url');
		echo $form->input('Category');
	?>
	</fieldset>
<?php echo $form->end('Create');?>
</div>