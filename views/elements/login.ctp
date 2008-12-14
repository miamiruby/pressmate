<fieldset>
	<legend><?php __('Sign In') ?></legend>
<?php print $form->create('User', array('action' => 'login'))?>
<?php print $form->input('username') ?>
<?php print $form->input('password') ?>
<?php print $form->end('Login')?>
</fieldset>