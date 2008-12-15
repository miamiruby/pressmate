<fieldset>
	<legend><?php __('Links') ?></legend>
	<?php foreach ($links as $l) { ?>
		<?php print $html->link($l['Link']['name'], $l['Link']['url']) ?>
	<?php } ?>
</fieldset>

