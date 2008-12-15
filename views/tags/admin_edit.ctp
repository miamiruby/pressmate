<fieldset>
	<legend><?php __('Edit Tag') ?></legend>
	<?php print $form->create('Tag', array('url' => '/admin/tags/edit')) ?>
	<?php print $form->hidden('id') ?>
	<?php print $form->input('name')?>
	<?php print $form->end('Update ') ?>
</fieldset>