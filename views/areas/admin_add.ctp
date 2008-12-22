<fieldset>
	<legend><?php __('Add Area') ?></legend>
	<?php print $form->create('Area', array('action' => 'add', 'admin' => true)) ?>
	<?php print $form->input('name')?>
	<?php print $form->input('Url.0.url') ?>
	<?php print $form->end('Add') ?>
</fieldset>