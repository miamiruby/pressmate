<fieldset>
	<legend><?php __('Add Comment') ?></legend>
	<?php print $form->create('Comment')?>
	<?php #print $jqueryForm->validate('CommentAddForm') ?>
	<?php print $form->hidden('content_id', array('value' => $c['Content']['id'])) ?>
	<?php print $form->input('name') ?>
	<?php print $form->input('email') ?>
	<?php print $form->input('url', array('label' => 'Web Site')) ?>
	<?php print $form->input('body', array('label' => 'Comment')) ?>
	<?php print $form->end('Submit') ?>
</fieldset>