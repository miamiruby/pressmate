<?php foreach ($contents as $c) { ?>
	<div class="post">
		<div class="title"><?php print $c['Content']['title']?></div>
		<div class="who"><?php print $c['User']['first_name'].' '.$c['User']['last_name']?></div>
		<div class="time"><?php print date('F d, Y', strtotime($c['Content']['updated']))?></div>
		<div class="body"><?php print $c['Content']['body'] ?></div>
	</div>

	<div class="comments">
		<?php if ($c['Content']['commentable']) print $this->renderElement('comments', array('comments' => $c['Comment'])) ?>
	</div>

	<div class="comments">
		<?php if ($c['Content']['commentable']) print $this->renderElement('comment', compact('c')) ?>
	</div>
<?php } ?>