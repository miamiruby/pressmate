<fieldset>
	<legend><?php __('Edit Image') ?></legend>
	<?php print $html->image($this->data['Image']['url']) ?>
	<?php print $form->create('Image', array('action' => 'edit', 'admin' => true)) ?>
	<?php print $form->hidden('id')?>
	<?php print $form->input('name') ?>
	<?php print $form->end('Update')?>
	<?php ?>
</fieldset>