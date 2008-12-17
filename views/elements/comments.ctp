<?php if (count($comments)) { ?>
<h1>Comments</h1><br />
<?php foreach ($comments as $c) { ?>
<div>
	<h2><?php print h($c['name'])?></h2>
	<h3><?php print h(wordwrap($c['body'], 75, "\n", true))?></h3>
</div><br />
<?php } ?>
<?php } ?>