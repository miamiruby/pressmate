<?php if (count($comments)) { ?>
<h1>Comments</h1><br />
<?php foreach ($comments as $c) { ?>
<div>
	<h2><?php print $c['name']?></h2>
	<h3><?php print $c['body']?></h3>
</div><br />
<?php } ?>
<?php } ?>