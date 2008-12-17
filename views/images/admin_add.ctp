<fieldset>
	<legend><?php __('Add Image') ?></legend>
	<?php print $form->create('Image', array('action' => 'add', 'admin' => true, 'type' => 'file')) ?>
	<?php print $form->file('image') ?>
	<?php print $form->end('Add')?>
	<?php ?>
</fieldset>