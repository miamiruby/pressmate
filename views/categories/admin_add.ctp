<fieldset>
	<legend><?php __('Add Category') ?></legend>
	<?php print $form->create('Category', array('url' => '/admin/categories/add')) ?>
	<?php print $form->input('parent_id', array('empty' => true)) ?>
	<?php print $form->input('name')?>
	<?php print $form->end('Add') ?>
</fieldset>