<fieldset>
	<legend><?php __('Add Tag') ?></legend>
	<?php print $form->create('Tag', array('url' => '/admin/tags/add')) ?>
	<?php print $form->input('name')?>
	<?php print $form->end('Add') ?>
</fieldset>