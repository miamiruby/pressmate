<fieldset>
	<legend><?php __('Edit Category') ?></legend>
	<?php print $form->create('Category', array('url' => '/admin/categories/edit')) ?>
	<?php print $form->hidden('id') ?>
	<?php print $form->input('parent_id', array('empty' => true)) ?>
	<?php print $form->input('name')?>
	<?php print $form->end('Update ') ?>
</fieldset>