<script>
$(document).ready(function(){
   $("#InstallHost").focus();
 });
</script>

<h1><?php __('PressMate Installation') ?></h1>

<fieldset>
	<legend><?php __('MySQL Database Information') ?></legend>
<?php print $form->create('Install', array('url' => '/install')) ?>
<?php print $form->input('host') ?>
<?php print $form->input('database') ?>
<?php print $form->input('username') ?>
<?php print $form->input('password') ?>
<?php print $form->end('Ok!')?>
</fieldset>