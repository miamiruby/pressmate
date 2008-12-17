<h1><?php __('PressMate Installation') ?></h1>

<fieldset>
	<legend><?php __('Configuration') ?></legend>
<?php print $form->create('Config', array('url' => '/install/configure')) ?>
<?php print $form->hidden('id', array('value' => 1))?>
<?php print $form->input('site_name') ?>
<?php print $form->input('image_path', array('value' => 'upload/'))?>
<?php print $form->input('User.first_name') ?>
<?php print $form->input('User.last_name') ?>
<?php print $form->input('User.email') ?>
<?php print $form->input('User.username') ?>
<?php print $form->input('User.password') ?>
<?php print $form->input('User.avatar_url', array('value' => 'http://www.gravatar.com/avatar/'))?>

<?php print $form->end('Ok!')?>
</fieldset>