<fieldset>
	<legend><?php __('Add Comment') ?></legend>
	<?php print $form->create('Comment')?>
	<?php print $form->hidden('content_id', array('value' => $c['Content']['id'])) ?>
	<?php print $form->input('name') ?>
	<?php print $form->input('email') ?>
	<?php print $form->input('url', array('label' => 'Web Site')) ?>
	<?php print $form->input('body', array('label' => 'Comment')) ?>
	<div class="input">
		<label><?php print Configure::read('Config.spam_question') ?></label>
		<?php print $form->text('spam_answer') ?>
		<?php print $form->error('spam_answer')?>
	</div>
	<?php print $form->end('Submit') ?>
</fieldset>