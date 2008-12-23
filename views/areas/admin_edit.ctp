<fieldset>
	<legend><?php __('Edit Area') ?></legend>
	<?php print $form->create('Area', array('action' => 'edit', 'admin' => true)) ?>
	<?php print $form->hidden('id') ?>
	<?php print $form->input('name')?>
	<?php print $form->hidden('Url.0.id') ?>
	<?php print $form->input('Url.0.url') ?>
	<?php print $form->end('Update') ?>
</fieldset>