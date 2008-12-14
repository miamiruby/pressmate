<fieldset>
	<legend><?php __('Edit Link') ?></legend>
	<?php print $form->create('Link', array('url' => '/admin/links/edit')) ?>
	<?php print $form->hidden('id') ?>
	<?php print $form->input('name')?>
	<?php print $form->input('url') ?>
	<?php print $form->end('Update ') ?>
</fieldset>