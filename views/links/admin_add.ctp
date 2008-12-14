<fieldset>
	<legend><?php __('Add Link') ?></legend>
	<?php print $form->create('Link', array('url' => '/admin/links/add')) ?>
	<?php print $form->input('name')?>
	<?php print $form->input('url') ?>
	<?php print $form->end('Add') ?>
</fieldset>