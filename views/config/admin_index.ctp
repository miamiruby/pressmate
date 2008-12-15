<fieldset>
	<legend><?php __('Configuration') ?></legend>
	<?php print $form->create('Config', array('url' => '/admin/config')) ?>
	<?php print $form->input('site_name') ?>
	<?php print $form->input('avatar_url') ?>
	<?php print $form->input('google_analytics') ?>
	<?php print $form->input('spam_question') ?>
	<?php print $form->input('spam_answer') ?>
	<?php print $form->end('Update') ?>
</fieldset>