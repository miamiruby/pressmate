<fieldset>
	<legend><?php __('Categories') ?></legend>
	<?php foreach ($categories as $c) { ?>
		<?php print $c['Category']['name'] ?><br />
	<?php } ?>
</fieldset>

