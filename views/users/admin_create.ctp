<fieldset>
	<legend><?php __('Create User Account') ?></legend>
	<?php print $form->create('User', array('action' => 'create', 'admin' => true))?>
	<?php print $jqueryForm->validate('UserCreateForm') ?>
	<?php print $form->input('first_name') ?>
	<?php print $form->input('last_name') ?>
	<?php print $form->input('username') ?>
	<?php print $form->input('avatar_url')?>
	<?php print $form->input('password1', array('label' => 'Password', 'type' => 'password')) ?>
	<?php print $form->input('password2', array('label' => 'Confirm Password', 'type' => 'password')) ?>
	<?php print $form->end('Create')?>
</fieldset>