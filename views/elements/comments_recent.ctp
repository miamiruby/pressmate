<div id="comments_recent">
<fieldset>
	<legend><?php __('Comments') ?></legend>
	<?php foreach ($commentsRecent as $r) { ?>
		<div class="comment">
			<div class="who">By <?php print h($r['Comment']['name'])?> <?php print $time->timeAgoInWords($r['Comment']['created']) ?></div>
			<div class="body"><?php print wordwrap($r['Comment']['body'], 20, '<br />', true) ?></div>
		</div>
	<?php } ?>
</fieldset>
</div>

